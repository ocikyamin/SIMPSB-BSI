<?php

function CountDB()
{
	return $db= \Config\Database::connect(); 
}
function CountByLevelAndGender($level_id = null, $periode_id = null, $gender = null)
{
    $db = \Config\Database::connect();

    $query = $db->table('csb_akun');

    if (!is_null($level_id)) {
        $query->where('master_school_level_id', $level_id);
    }

    if (($periode_id !=='all')) {
        $query->where('master_periode_id', $periode_id);
    }

    if (!is_null($gender)) {
        $query->where('gender', $gender); // Ganti 'jenis_kelamin' dengan nama kolom yang sesuai dengan database Anda
    }

    return $query->countAllResults();
}

function countRegistrationsByKabupaten(int $kabupatenId)
{
    $db = \Config\Database::connect(); // Get the database connection

    // Replace 'registrations' with the actual name of your table
    $builder = $db->table('csb_akun');

    // Count the rows with the specified kabupaten_id
    $builder->where('kabupaten_id', $kabupatenId);
    $count = $builder->countAllResults();

    return $count;
}