<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\apartment;

class Apartmentfilter extends Component
{
    use WithPagination;

	public $searchTerm;
    public $currentPage = 1;

    public function render()
    {
    	$query = '%'.$this->searchTerm.'%';

    	return view('livewire.apartmentfilter', [
    		'apartment'		=>	apartment::where(function($sub_query){
    							$sub_query->where('gewog', 'like', '%'.$this->searchTerm.'%')
    									  ->orWhere('dzongkhag', 'like', '%'.$this->searchTerm.'%');
    						})
                            // ->paginate(2)
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