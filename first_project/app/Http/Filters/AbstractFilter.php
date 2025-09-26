<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;
abstract class AbstractFilter implements FilterInterface
{
    /** @var array */
    private $queryParams = []; // параметры кот-е мы прокидывали, типа title/category_id etc

    /**
     * AbstractFilter constructor.
     *
     * @param array $queryParams
     */
    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams; // инициализация, на основании этого классы будет создаваться обьект, у кот-го будут проинициализированы параметры в виде массива
    }

    abstract protected function getCallbacks(): array; // возвращается массив ассоциативных коллбеков

    public function apply(Builder $builder)
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) { // проверка на наличие в queryParams
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    /**
     * @param Builder $builder
     */
    protected function before(Builder $builder)
    {
    }

    /**
     * @param string $key
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    protected function getQueryParam(string $key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    /**
     * @param string[] $keys
     *
     * @return AbstractFilter
     */
    protected function removeQueryParam(string ...$keys)
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
