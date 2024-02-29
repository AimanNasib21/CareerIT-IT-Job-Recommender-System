<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ResumeLang extends Component
{
    public $langs, $language, $level, $lang_id;
    public $updateMode = false;

    public function render()
    {
        $this->langs = auth()->user()->resumeLangs;
        return view('livewire.resume-lang');
    }

    private function resetInputFields(){
        $this->language = '';
        $this->level = '';
    }

    public function store()
    {
        $this->validate([
            'language' => 'required',
            'level' => 'required',
        ]);

        $user = Auth::user();

        $user->resumeLangs()->create([
            'language' => $this->language,
            'level' => $this->level,
        ]);

        $this->resetInputFields();

        session()->flash('success', 'Language added successfully.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $award = $user->resumeLangs()->where('id', $id)->first();
        $this->lang_id = $id;
        $this->language = $award->language;
        $this->level = $award->level;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'language' => 'required',
            'level' => 'required',
        ]);

        $user = Auth::user();
        $award = $user->resumeLangs()->where('id', $this->lang_id)->first();
        $award->language = $this->language;
        $award->level = $this->level;
        $award->save();

        $this->updateMode = false;

        session()->flash('success', 'Language updated successfully.');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $user = Auth::user();
        $skill = $user->resumeLangs()->where('id', $id)->first();
        $skill->delete();
        session()->flash('success', 'Language deleted successfully.');
    }
}
