<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ResumeToolTag extends Component
{

    public $tools, $title, $tool_id;
    public $updateMode = false;

    public function render()
    {
        $this->tools = auth()->user()->resumeOthers;
        return view('livewire.resume-tool-tag');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
        ]);

        $user = auth()->user();

        $user->resumeOthers()->create([
            'title' => $this->title,
        ]);

        $this->title = '';

        session()->flash('success', 'Tool added successfully.');
    }

    public function delete($id)
    {
        $user = auth()->user();
        $tool = $user->resumeOthers()->where('id', $id)->first();
        $tool->delete();
        session()->flash('success', 'Tool deleted successfully.');
    }
}
