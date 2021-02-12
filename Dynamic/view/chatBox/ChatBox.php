<?php


namespace Modules\PanelCore\Dynamic\view\chatBox;


use Modules\PanelCore\Dynamic\core\Element;

class ChatBox extends Element
{

    private array $messages = [];

    public function __construct($messages)
    {
        $this->messages = $messages;
    }


    public function render()
    {
        return view('panel_ui::components.view.chatBox.chat_box', [
            "messages" => $this->messages
        ]);
    }
}
