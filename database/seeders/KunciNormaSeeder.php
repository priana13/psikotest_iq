<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class KunciNormaSeeder extends Seeder
{
    /**
     * Nama file XLSX yang akan dibaca.
     * Letakkan file di folder: database/seeders/data/
     */
    protected string $fileName = 'kunci_norma_ge.xlsx';

    public function run(): void
    {
        $filePath = database_path('seeders/data/' . $this->fileName);

        if (!file_exists($filePath)) {
            $this->command->error("File tidak ditemukan: {$filePath}");
            return;
        }

        $spreadsheet = IOFactory::load($filePath);
        $sheet       = $spreadsheet->getActiveSheet();
        $rows        = $sheet->toArray(null, true, true, true); // A, B, C, ...

        // Baris pertama = header, petakan nama kolom → indeks huruf
        $header     = array_map('trim', $rows[1]);
        $columnMap  = array_flip($header); // ['tipe_usia' => 'A', 'usia' => 'B', ...]

        $requiredColumns = ['tipe_usia', 'usia', 'rw', 'ge', 'ket'];
        foreach ($requiredColumns as $col) {
            if (!array_key_exists($col, $columnMap)) {
                $this->command->error("Kolom '{$col}' tidak ditemukan di header XLSX.");
                return;
            }
        }

        $data      = [];
        $now       = now();
        $totalRows = count($rows);

        for ($i = 2; $i <= $totalRows; $i++) {
            $row = $rows[$i] ?? [];

            // Lewati baris kosong
            $values = array_filter($row, fn($v) => $v !== null && $v !== '');
            if (empty($values)) {
                continue;
            }

            $data[] = [
                'tipe_usia'  => $row[$columnMap['tipe_usia']] ?? null,
                'usia'       => $row[$columnMap['usia']]      ?? null,
                'rw'         => $row[$columnMap['rw']]        ?? null,
                'ge'         => $row[$columnMap['ge']]        ?? null,
                'ket'        => $row[$columnMap['ket']]       ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ];

            // Insert per 500 baris agar tidak habiskan memori
            if (count($data) === 500) {
                DB::table('kunci_norma')->insert($data);
                $data = [];
            }
        }

        // Insert sisa data
        if (!empty($data)) {
            DB::table('kunci_norma')->insert($data);
        }

        $this->command->info('Data kunci_norma berhasil di-seed dari ' . $this->fileName);
    }
}