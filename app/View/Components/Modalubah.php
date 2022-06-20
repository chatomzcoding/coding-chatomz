<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modalubah extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $link;
    public $judul;
    public $tabindex;
    public $size;

    public function __construct($link,$judul='ubah data',$id="ubah",$tabindex="-1",$size=null)
    {
        $this->id = $id;
        $this->link = $link;
        $this->judul = $judul;
        $this->tabindex = $tabindex;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modalubah');
    }
}
