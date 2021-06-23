<?php

namespace App\Imports;

use App\Models\Admin\Settings\SalesTax;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class SalesTaxImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $salesTax = SalesTax::where('zip_code', $row['ZipCode'])->first();

        if ($salesTax) {
            $salesTax->region_name = $row['TaxRegionName'];
            $salesTax->state_rate = $row['StateRate'];
            $salesTax->estimated_combined_rate = $row['EstimatedCombinedRate'];
            $salesTax->estimated_country_rate = $row['EstimatedCountyRate'];
            $salesTax->estimated_city_rate = $row['EstimatedCityRate'];
            $salesTax->estimated_special_rate = $row['EstimatedSpecialRate'];
            $salesTax->risk_level = $row['RiskLevel'];
            $salesTax->save();
            return null;
        } else {
            return new SalesTax([
                'state' => $row['State'],
                'zip_code' => $row['ZipCode'],
                'region_name' => $row['TaxRegionName'],
                'state_rate' => $row['StateRate'],
                'estimated_combined_rate' => $row['EstimatedCombinedRate'],
                'estimated_country_rate' => $row['EstimatedCountyRate'],
                'estimated_city_rate' => $row['EstimatedCityRate'],
                'estimated_special_rate' => $row['EstimatedSpecialRate'],
                'risk_level' => $row['RiskLevel'],
                'status' => 'Active'
            ]);
        }

    }


}
