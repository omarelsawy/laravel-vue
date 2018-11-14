<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

class QuoteRBDController extends Controller
{

   protected $repositoryInterface;

   public function __construct(RepositoryInterface $repositoryInterface)
   {
       // set the model
       
       $this->repositoryInterface = $repositoryInterface;
   }

   public function index()
   {
       return $this->repositoryInterface->all();
   }
}