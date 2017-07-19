<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * EnvironmentPermitCompanyProfileSearch represents the model behind the search form about `backend\models\EnvironmentPermitCompanyProfile`.
 */
class EnvironmentPermitCompanyProfileSearch extends EnvironmentPermitCompanyProfile
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['ep_profile_name', 'ep_profile_activity_loc_address', 'ep_profile_phone_fax', 'ep_profile_main_office_address', 'ep_profile_holding_name', 'ep_profile_holding_office_address', 'ep_profile_holding_phone_fax', 'ep_profile_company_established_year', 'ep_profile_industry_field', 'ep_profile_capital_status', 'ep_profile_area_factory', 'ep_profile_number_of_employees', 'ep_profile_production_capacity_installed', 'ep_profile_production_capacity_realization', 'ep_profile_raw_material', 'ep_profile_adjuvant_material', 'ep_profile_production_process', 'ep_profile_export_marketing_percentage', 'ep_profile_local_marketing_percentage', 'ep_profile_environment_document', 'ep_profile_contacts_name', 'ep_profile_contacts_mobile_phone', 'ep_profile_contacts_email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EnvironmentPermitCompanyProfile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sector_id' => $this->sector_id,
            'power_plant_id' => $this->power_plant_id,
        ]);

        $query->andFilterWhere(['like', 'ep_profile_name', $this->ep_profile_name])
            ->andFilterWhere(['like', 'ep_profile_activity_loc_address', $this->ep_profile_activity_loc_address])
            ->andFilterWhere(['like', 'ep_profile_phone_fax', $this->ep_profile_phone_fax])
            ->andFilterWhere(['like', 'ep_profile_main_office_address', $this->ep_profile_main_office_address])
            ->andFilterWhere(['like', 'ep_profile_holding_name', $this->ep_profile_holding_name])
            ->andFilterWhere(['like', 'ep_profile_holding_office_address', $this->ep_profile_holding_office_address])
            ->andFilterWhere(['like', 'ep_profile_holding_phone_fax', $this->ep_profile_holding_phone_fax])
            ->andFilterWhere(['like', 'ep_profile_company_established_year', $this->ep_profile_company_established_year])
            ->andFilterWhere(['like', 'ep_profile_industry_field', $this->ep_profile_industry_field])
            ->andFilterWhere(['like', 'ep_profile_capital_status', $this->ep_profile_capital_status])
            ->andFilterWhere(['like', 'ep_profile_area_factory', $this->ep_profile_area_factory])
            ->andFilterWhere(['like', 'ep_profile_number_of_employees', $this->ep_profile_number_of_employees])
            ->andFilterWhere(['like', 'ep_profile_production_capacity_installed', $this->ep_profile_production_capacity_installed])
            ->andFilterWhere(['like', 'ep_profile_production_capacity_realization', $this->ep_profile_production_capacity_realization])
            ->andFilterWhere(['like', 'ep_profile_raw_material', $this->ep_profile_raw_material])
            ->andFilterWhere(['like', 'ep_profile_adjuvant_material', $this->ep_profile_adjuvant_material])
            ->andFilterWhere(['like', 'ep_profile_production_process', $this->ep_profile_production_process])
            ->andFilterWhere(['like', 'ep_profile_export_marketing_percentage', $this->ep_profile_export_marketing_percentage])
            ->andFilterWhere(['like', 'ep_profile_local_marketing_percentage', $this->ep_profile_local_marketing_percentage])
            ->andFilterWhere(['like', 'ep_profile_environment_document', $this->ep_profile_environment_document])
            ->andFilterWhere(['like', 'ep_profile_contacts_name', $this->ep_profile_contacts_name])
            ->andFilterWhere(['like', 'ep_profile_contacts_mobile_phone', $this->ep_profile_contacts_mobile_phone])
            ->andFilterWhere(['like', 'ep_profile_contacts_email', $this->ep_profile_contacts_email]);

        return $dataProvider;
    }

    public function export($id) {

        $query = EnvironmentPermitCompanyProfile::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_COMPANY_PROFILE, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::COMPANY_PROFILE);

        //Get model
        $model = $dataProvider->getModels()[0];

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(50);
        $activeSheet->getColumnDimension('C')->setWidth(1);
        $activeSheet->getColumnDimension('D')->setWidth(70);

        //header
        $activeSheet->mergeCells('A1:B1');
        $activeSheet->setCellValue('A1', "Form Self Assessment");
        $activeSheet->mergeCells('A2:B2');
        $activeSheet->setCellValue('A2', "Periode Penilaian ");
        $activeSheet->setCellValue('B4', "Profil Perusahaan");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];
        $activeSheet->getStyle('A1:B1')->applyFromArray($styleArray);
        $activeSheet->getStyle('A2:B2')->applyFromArray($styleArray);
        $activeSheet->getStyle('B4')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];

        //body header data
        $activeSheet->setCellValue('B5', AppLabels::COMPANY_NAME);
        $activeSheet->setCellValue('B6', AppLabels::ACTIVITY_LOCATION_ADDRESS);
        $activeSheet->setCellValue('B7', AppLabels::PHONE_FAX);
        $activeSheet->setCellValue('B8', AppLabels::MAIN_COMPANY_ADDRESS);
        $activeSheet->setCellValue('B9', AppLabels::HOLDING_COMPANY_NAME);
        $activeSheet->setCellValue('B10', AppLabels::HOLDING_COMPANY_OFFICE_ADDRESS);
        $activeSheet->setCellValue('B11', AppLabels::PHONE_FAX);
        $activeSheet->setCellValue('B12', AppLabels::COMPANY_ESTABLISHED_YEAR);
        $activeSheet->setCellValue('B13', AppLabels::INDUSTRY_FIELD);
        $activeSheet->setCellValue('B14', AppLabels::CAPITAL_STATUS);
        $activeSheet->setCellValue('B15', AppLabels::AREA_FACTORY);
        $activeSheet->setCellValue('B16', AppLabels::NUMBER_OF_EMPLOYEES);
        $activeSheet->setCellValue('B17', sprintf('%s %s', AppLabels::PRODUCTION_CAPACITY, AppLabels::INSTALLED));
        $activeSheet->setCellValue('B18', sprintf('%s %s', AppLabels::PRODUCTION_CAPACITY, AppLabels::REALIZATION));
        $activeSheet->setCellValue('B19', AppLabels::RAW_MATERIAL);
        $activeSheet->setCellValue('B20', AppLabels::ADJUVANT_MATERIAL);
        $activeSheet->setCellValue('B21', AppLabels::PRODUCTION_PROCESS);
        $activeSheet->setCellValue('B22', AppLabels::EXPORT_MARKETING_PERCENTAGE);
        $activeSheet->setCellValue('B23', AppLabels::LOCAL_MARKETING_PERCENTAGE);
        $activeSheet->setCellValue('B24', AppLabels::ENVIRONMENT_DOCUMENT_OWNED);
        $activeSheet->setCellValue('B25', AppLabels::CONTACT_NAME);
        $activeSheet->setCellValue('B26', AppLabels::MOBILE_PHONE);
        $activeSheet->setCellValue('B27', AppLabels::CONTACT_EMAIL);



        for($i = 5; $i<28; $i++){
            $activeSheet->getStyle('B' . $i)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $i, ":");
        }

        //==========================================================================

        //body
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],

        ];

        $activeSheet->setCellValue('D5', $model->ep_profile_name);
        $activeSheet->setCellValue('D6', $model->ep_profile_activity_loc_address);
        $activeSheet->setCellValue('D7', $model->ep_profile_phone_fax);
        $activeSheet->setCellValue('D8', $model->ep_profile_main_office_address);
        $activeSheet->setCellValue('D9', $model->ep_profile_holding_name);
        $activeSheet->setCellValue('D10', $model->ep_profile_holding_office_address);
        $activeSheet->setCellValue('D11', $model->ep_profile_holding_phone_fax);
        $activeSheet->setCellValue('D12', $model->ep_profile_company_established_year);
        $activeSheet->setCellValue('D13', $model->ep_profile_industry_field);
        $activeSheet->setCellValue('D14', $model->ep_profile_capital_status);
        $activeSheet->setCellValue('D15', $model->ep_profile_area_factory);
        $activeSheet->setCellValue('D16', $model->ep_profile_number_of_employees);
        $activeSheet->setCellValue('D17', $model->ep_profile_production_capacity_installed);
        $activeSheet->setCellValue('D18', $model->ep_profile_production_capacity_realization);
        $activeSheet->setCellValue('D19', $model->ep_profile_raw_material);
        $activeSheet->setCellValue('D20', $model->ep_profile_adjuvant_material);
        $activeSheet->setCellValue('D21', $model->ep_profile_production_process);
        $activeSheet->setCellValue('D22', $model->ep_profile_export_marketing_percentage);
        $activeSheet->setCellValue('D23', $model->ep_profile_local_marketing_percentage);
        $activeSheet->setCellValue('D24', $model->ep_profile_environment_document);
        $activeSheet->setCellValue('D25', $model->ep_profile_contacts_name);
        $activeSheet->setCellValue('D26', $model->ep_profile_contacts_mobile_phone);
        $activeSheet->setCellValue('D27', $model->ep_profile_contacts_email);

        for($i = 5; $i<28; $i++){
            $activeSheet->getStyle('D' . $i)->applyFromArray($styleArray);
        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
