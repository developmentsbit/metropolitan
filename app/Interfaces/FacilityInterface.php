<?php
namespace App\Interfaces;

interface FacilityInterface {
    public function index();

    public function create();

    public function store($request);

    public function show($id);

    public function edit($id);
    
    public function update($request,$id);

    public function destroy($id);

    public function restore($id);

    public function delete($id);
}