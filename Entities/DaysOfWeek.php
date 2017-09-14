<?php namespace Modules\Course\Entities;


class DaysOfWeek
{
    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;

    /**
     * @var array
     */
    private $days = [];

    public function __construct()
    {
        $this->days = [
            self::MONDAY    => "Pazartesi",
            self::TUESDAY   => "Salı",
            self::WEDNESDAY => "Çarşamba",
            self::THURSDAY  => "Perşembe",
            self::FRIDAY    => "Cuma",
            self::SATURDAY  => "Cumartesi",
            self::SUNDAY    => "Pazar"
        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->days;
    }

    /**
     * Get the post status
     * @param int $statusId
     * @return string
     */
    public function get($statusId)
    {
        if (isset($this->days[$statusId])) {
            return $this->days[$statusId];
        }

        return $this->days[self::MONDAY];
    }
}