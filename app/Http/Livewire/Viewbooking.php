<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\apartment;

class Viewbooking extends Component
{
    use WithPagination;

	public $searchTerm;

    public function render()
    {
    	$query = '%'.$this->searchTerm.'%';

    	return view('livewire.viewbooking', [
    		'apartment'		=>	apartment::where(function($sub_query){
    							$sub_query->where('gewog_id', 'like', '%'.$this->searchTerm.'%')
    									  ->orWhere('Longitude', 'like', '%'.$this->searchTerm.'%');
    						})->paginate(3)
    	]);
    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
}
