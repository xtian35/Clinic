<?php
require_once('../config/config.php');
if (isset($_GET['patient_id'])) :
    $teeth1 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 1]);
    $teeth2 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 2]);
    $teeth3 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 3]);
    $teeth4 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 4]);
    $teeth5 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 5]);
    $teeth6 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 6]);
    $teeth7 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 7]);
    $teeth8 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 8]);
    $teeth9 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 9]);
    $teeth10 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 10]);
    $teeth11 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 11]);
    $teeth12 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 12]);
    $teeth13 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 13]);
    $teeth14 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 14]);
    $teeth15 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 15]);
    $teeth16 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 16]);
    $teeth17 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 17]);
    $teeth18 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 18]);
    $teeth19 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 19]);
    $teeth20 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 20]);
    $teeth21 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 21]);
    $teeth22 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 22]);
    $teeth23 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 23]);
    $teeth24 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 24]);
    $teeth25 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 25]);
    $teeth26 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 26]);
    $teeth27 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 27]);
    $teeth28 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 28]);
    $teeth29 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 29]);
    $teeth30 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 30]);
    $teeth31 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 31]);
    $teeth32 = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => 32]);
?>
    <div class="popup" id="popup">
        <div class="row mx-auto mb-1">
            <button class="btn btn-primary btn-sm tooths-class tooties" tooth-type="1">Filled</button>
        </div>
        <div class="row mx-auto mb-1">
            <button class="btn btn-primary btn-sm tooths-class tooties" tooth-type="2">Cavity</button>
        </div>
        <div class="row mx-auto">
            <button class="btn btn-primary btn-sm tooths-class tooties" tooth-type="3" tooth-type>Extracted</button>
        </div>
    </div>

    <img class="teeths teeth1" src="<?php echo $teeth1['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no1.png' : ($teeth1['Tooth_Status'] == 2 ? '../public/assets/images/teeth/cavities/tooth no1.png' : '../public/assets/images/teeth/default.png'); ?>">
    <img class="teeths teeth2" src="<?php echo $teeth2['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no2.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth3" src="<?php echo $teeth3['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no3.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth4" src="<?php echo $teeth4['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no4.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth5" src="<?php echo $teeth5['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no5.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth6" src="<?php echo $teeth6['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no6.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth7" src="<?php echo $teeth7['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no7.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth8" src="<?php echo $teeth8['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no8.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth9" src="<?php echo $teeth9['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no9.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth10" src="<?php echo $teeth10['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no10.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth11" src="<?php echo $teeth11['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no11.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth12" src="<?php echo $teeth12['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no12.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth13" src="<?php echo $teeth13['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no13.png' : '../public/assets/images/teeth/default.png'; ?>"">
    <img class=" teeths teeth14" src="<?php echo $teeth14['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no14.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth15" src="<?php echo $teeth15['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no15.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth16" src="<?php echo $teeth16['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no16.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth17" src="<?php echo $teeth17['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no17.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth18" src="<?php echo $teeth18['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no18.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth19" src="<?php echo $teeth19['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no19.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth20" src="<?php echo $teeth20['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no20.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth21" src="<?php echo $teeth21['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no21.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth22" src="<?php echo $teeth22['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no22.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth23" src="<?php echo $teeth23['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no23.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth24" src="<?php echo $teeth24['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no24.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth25" src="<?php echo $teeth25['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no25.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth26" src="<?php echo $teeth26['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no26.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth27" src="<?php echo $teeth27['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no27.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth28" src="<?php echo $teeth28['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no28.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth29" src="<?php echo $teeth29['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no29.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth30" src="<?php echo $teeth30['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no30.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth31" src="<?php echo $teeth31['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no31.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="teeths teeth32" src="<?php echo $teeth32['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no32.png' : '../public/assets/images/teeth/default.png'; ?>">
    <img class="bg-light" style="height:100%; width:100%; object-fit:contain" src="../public/assets/images/toothchart.png">
<?php endif; ?>