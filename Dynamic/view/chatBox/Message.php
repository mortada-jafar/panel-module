<?php


namespace Modules\PanelCore\Dynamic\view\chatBox;


use Modules\PanelCore\Dynamic\core\Element;
use Modules\PanelCore\Dynamic\core\Field;

class Message extends Element
{


    public string $message;
    public string $created_at;
    public $user;
    public string $image;
    public  $attaches;
    public bool $isYou;

    public function __construct(string $message, $isYou, $user,$attaches, string $created_at)
    {

        $this->message = $message;
        $this->created_at = $created_at;
        $this->user = $user;
        $this->isYou = $isYou;
        $this->attaches = $attaches;
    }


    public function render()
    {
        return view('panel_ui::components.view.chatBox.message', [
            'message' => $this->message,
            'user' => $this->user,
            'created_at' => $this->created_at,
            'isYou' => $this->isYou,
            'attaches' => $this->attaches,
        ]);
    }
}
