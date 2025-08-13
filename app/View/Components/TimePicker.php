<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TimePicker extends Component
{
    /**
     * The input name attribute.
     *
     * @var string
     */
    public $name;

    /**
     * The input id attribute.
     *
     * @var string|null
     */
    public $id;

    /**
     * The input value.
     *
     * @var string|null
     */
    public $value;

    /**
     * The input placeholder.
     *
     * @var string|null
     */
    public $placeholder;

    /**
     * Whether the input is required.
     *
     * @var bool
     */
    public $required;

    /**
     * Default hour value.
     *
     * @var int
     */
    public $defaultHour;

    /**
     * Default minute value.
     *
     * @var int
     */
    public $defaultMinute;

    /**
     * Minute increment value.
     *
     * @var int
     */
    public $minuteIncrement;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|null  $id
     * @param  string|null  $value
     * @param  string|null  $placeholder
     * @param  bool  $required
     * @param  int  $defaultHour
     * @param  int  $defaultMinute
     * @param  int  $minuteIncrement
     * @return void
     */
    public function __construct(
        string $name, 
        string $id = null, 
        string $value = null, 
        string $placeholder = null, 
        bool $required = false,
        int $defaultHour = 9,
        int $defaultMinute = 0,
        int $minuteIncrement = 30
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = $value;
        $this->placeholder = $placeholder ?? 'Select time';
        $this->required = $required;
        $this->defaultHour = $defaultHour;
        $this->defaultMinute = $defaultMinute;
        $this->minuteIncrement = $minuteIncrement;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.time-picker');
    }
}
