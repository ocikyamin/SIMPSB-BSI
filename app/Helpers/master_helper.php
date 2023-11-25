<?php
function MasterCon()
{
	return $db= \Config\Database::connect(); 
}

// Status Periode
function StatusPeriode(){
return $query= MasterCon()->table('master_periode')
->where('is_active', 1)
->get()
->getRow();
}
// Tabel Master 
function TabelMasterStatus($tabel_name){
return $query= MasterCon()->table($tabel_name)
->where('is_active', 1)
->get()
->getResultArray();
}

function TabelMaster($tabel_name){
return $query= MasterCon()->table($tabel_name)
->get()
->getResultArray();
}

// app/Helpers/NomorOtomatis_helper.php