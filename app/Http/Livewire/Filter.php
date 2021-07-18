<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\apartment;

class Filter extends Component
{
	use WithPagination;

	public $searchTerm;
    public $currentPage = 1;
    public function registered()
    {
     
    	// $users=User::paginate(2);
     $users=User::where('usertype','tenant')->get();
    
      
    	return view('admin.register')->with('users',$users);
    }
    public function render()
    {
    	$query = '%'.$this->searchTerm.'%';

    	return view('livewire.filter', [
    		'users'		=>	User::where(function($sub_query){
    							$sub_query->where('usertype','tenant')->get();
                                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
    									  ->Where('email', 'like', '%'.$this->searchTerm.'%');
    						})->paginate(2)
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

