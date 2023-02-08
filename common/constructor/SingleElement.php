<?php


namespace common\constructor;

class SingleElement extends BaseElement
{
    protected bool $addOther = false;
    protected bool $addNeither = false;
    protected bool $addComment = false;
    protected bool $multiple = false;
    protected array $inputPoint = [];

    public function fillData(array $data = []) : void
    {
        $this->addOther = !empty($data['addOther']);
        $this->addNeither = !empty($data['addNeither']);
        $this->addComment = !empty($data['addComment']);
        $this->multiple = !empty($data['multiple']);

        $this->inputPoint = [];

        $n = 1;
        foreach ($data as $name => $value) {
            if (strpos($name, 'inputpoint_') === false) continue;

            $name = 'inputpoint_' . $this->groupData['number'] . '_' . $this->elementOrder . '_' . $n;

            array_push($this->inputPoint, compact('name', 'value'));

            $n++;
        }
    }

    public function getElementHTML() : string
    {
        return $this->renderFile(self::VIEW_PATH . 'single.php', $this->toArray());
    }

    public function toArray() : array
    {
        return array_merge($this->getOptions(), [
            'addOther' => $this->addOther,
            'addNeither' => $this->addNeither,
            'addComment' => $this->addComment,
            'multiple' => $this->multiple,
            'inputPoint' => $this->inputPoint,
        ]);
    }
}