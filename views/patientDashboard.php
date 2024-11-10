<?php require_once('patientHeader.php'); ?>
<div class="row mx-auto mb-2">
    <h3 class="h3">Dashboard</h3>
</div>
<div class="row mx-auto">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-md-3 rounded py-2 bg-gradient-primary d-flex justify-content-center align-items-centerd">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" fill="#fff" width="48">
                            <path d="M480.404 661q-18.822 0-32.113-13.177T435 616.123q0-18.523 13.379-31.823t32.2-13.3q18.821 0 31.621 13.177 12.8 13.177 12.8 31.7T512.112 647.7Q499.225 661 480.404 661Zm-160.281 0q-18.523 0-31.823-13.177t-13.3-31.7q0-18.523 13.177-31.823t31.7-13.3q18.523 0 31.823 13.177t13.3 31.7q0 18.523-13.177 31.823t-31.7 13.3Zm319.298 0Q622 661 608.5 647.823t-13.5-31.7q0-18.523 13.588-31.823 13.587-13.3 31.508-13.3 17.922 0 31.413 13.177t13.491 31.7q0 18.523-13.379 31.823t-32.2 13.3ZM480.404 821q-18.822 0-32.113-13.588Q435 793.825 435 775.904q0-17.922 13.379-31.413t32.2-13.491q18.821 0 31.621 13.379 12.8 13.379 12.8 32.2Q525 794 512.112 807.5 499.225 821 480.404 821Zm-160.281 0q-18.523 0-31.823-13.588-13.3-13.587-13.3-31.508 0-17.922 13.177-31.413t31.7-13.491q18.523 0 31.823 13.379t13.3 32.2Q365 794 351.823 807.5t-31.7 13.5Zm319.298 0Q622 821 608.5 807.412 595 793.825 595 775.904q0-17.922 13.588-31.413Q622.175 731 640.096 731q17.922 0 31.413 13.379t13.491 32.2Q685 794 671.621 807.5t-32.2 13.5ZM190 998q-37.175 0-64.088-27.612Q99 942.775 99 907V306q0-37.588 26.912-64.794Q152.825 214 190 214h59v-61h79v61h304v-61h79v61h59q37.588 0 64.794 27.206Q862 268.412 862 306v601q0 35.775-27.206 63.388Q807.588 998 770 998H190Zm0-91h580V488H190v419Z" />
                        </svg>
                    </div>
                    <div>
                     
                        <h3><?=$today_patient?></h3>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-secondary"><i class="fa fa-calendar"></i> Accepted Appointments Today</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-md-3 rounded py-2 bg-gradient-warning d-flex justify-content-center align-items-centerd">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" fill="#fff" width="48">
                            <path d="M480.404 661q-18.822 0-32.113-13.177T435 616.123q0-18.523 13.379-31.823t32.2-13.3q18.821 0 31.621 13.177 12.8 13.177 12.8 31.7T512.112 647.7Q499.225 661 480.404 661Zm-160.281 0q-18.523 0-31.823-13.177t-13.3-31.7q0-18.523 13.177-31.823t31.7-13.3q18.523 0 31.823 13.177t13.3 31.7q0 18.523-13.177 31.823t-31.7 13.3Zm319.298 0Q622 661 608.5 647.823t-13.5-31.7q0-18.523 13.588-31.823 13.587-13.3 31.508-13.3 17.922 0 31.413 13.177t13.491 31.7q0 18.523-13.379 31.823t-32.2 13.3ZM480.404 821q-18.822 0-32.113-13.588Q435 793.825 435 775.904q0-17.922 13.379-31.413t32.2-13.491q18.821 0 31.621 13.379 12.8 13.379 12.8 32.2Q525 794 512.112 807.5 499.225 821 480.404 821Zm-160.281 0q-18.523 0-31.823-13.588-13.3-13.587-13.3-31.508 0-17.922 13.177-31.413t31.7-13.491q18.523 0 31.823 13.379t13.3 32.2Q365 794 351.823 807.5t-31.7 13.5Zm319.298 0Q622 821 608.5 807.412 595 793.825 595 775.904q0-17.922 13.588-31.413Q622.175 731 640.096 731q17.922 0 31.413 13.379t13.491 32.2Q685 794 671.621 807.5t-32.2 13.5ZM190 998q-37.175 0-64.088-27.612Q99 942.775 99 907V306q0-37.588 26.912-64.794Q152.825 214 190 214h59v-61h79v61h304v-61h79v61h59q37.588 0 64.794 27.206Q862 268.412 862 306v601q0 35.775-27.206 63.388Q807.588 998 770 998H190Zm0-91h580V488H190v419Z" />
                        </svg>
                    </div>
                    <div>
                        <h3><?=$this_week_patient?></h3>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-secondary"><i class="fa fa-calendar"></i> Accepted Appointments This Week</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-md-3 rounded py-2 bg-gradient-danger d-flex justify-content-center align-items-centerd">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" fill="#fff" width="48">
                            <path d="M480.404 661q-18.822 0-32.113-13.177T435 616.123q0-18.523 13.379-31.823t32.2-13.3q18.821 0 31.621 13.177 12.8 13.177 12.8 31.7T512.112 647.7Q499.225 661 480.404 661Zm-160.281 0q-18.523 0-31.823-13.177t-13.3-31.7q0-18.523 13.177-31.823t31.7-13.3q18.523 0 31.823 13.177t13.3 31.7q0 18.523-13.177 31.823t-31.7 13.3Zm319.298 0Q622 661 608.5 647.823t-13.5-31.7q0-18.523 13.588-31.823 13.587-13.3 31.508-13.3 17.922 0 31.413 13.177t13.491 31.7q0 18.523-13.379 31.823t-32.2 13.3ZM480.404 821q-18.822 0-32.113-13.588Q435 793.825 435 775.904q0-17.922 13.379-31.413t32.2-13.491q18.821 0 31.621 13.379 12.8 13.379 12.8 32.2Q525 794 512.112 807.5 499.225 821 480.404 821Zm-160.281 0q-18.523 0-31.823-13.588-13.3-13.587-13.3-31.508 0-17.922 13.177-31.413t31.7-13.491q18.523 0 31.823 13.379t13.3 32.2Q365 794 351.823 807.5t-31.7 13.5Zm319.298 0Q622 821 608.5 807.412 595 793.825 595 775.904q0-17.922 13.588-31.413Q622.175 731 640.096 731q17.922 0 31.413 13.379t13.491 32.2Q685 794 671.621 807.5t-32.2 13.5ZM190 998q-37.175 0-64.088-27.612Q99 942.775 99 907V306q0-37.588 26.912-64.794Q152.825 214 190 214h59v-61h79v61h304v-61h79v61h59q37.588 0 64.794 27.206Q862 268.412 862 306v601q0 35.775-27.206 63.388Q807.588 998 770 998H190Zm0-91h580V488H190v419Z" />
                        </svg>
                    </div>
                    <div>
                        <h3><?=$next_week_patient?></h3>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-secondary"><i class="fa fa-calendar"></i> Accepted Appointments Next Week</p>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-4">
        <div class="row mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 m-0 mx-0 rounded  bg-gradient-secondary  ">
                            <dl>
                                <dt>Tooth Extraction</dt>
                                <dd class="mt-1">The dental clinic at ISAT U provides tooth extraction services to members of the student body,faculty,and local community</dd>
                            </dl>
                        </div>
                        <div class="col-md-2 mx-0 rounded  bg-gradient-secondary d-flex ">
                            <dl>
                                <dt>Dental Fillings</dt>
                                <dd class="mt-1">The dental clinic at ISAT U provides Dental Fillings services to members of the student body,faculty,and local community</dd>
                            </dl>
                        </div>
                        <div class="col-md-2 mx-0 rounded  bg-gradient-secondary d-flex ">
                            <dl>
                                <dt>Oral Prophylaxis</dt>
                                <dd class="mt-1">The dental clinic at ISAT U provides Oral Prophylaxis services to members of the student body,faculty,and local community</dd>
                            </dl>
                        </div>
                        <div class="col-md-2 mx-0 rounded  bg-gradient-secondary d-flex ">
                            <dl>
                                <dt>Oral Examination</dt>
                                <dd class="mt-1">The dental clinic at ISAT U provides Oral Examination services to members of the student body,faculty,and local community</dd>
                            </dl>
                        </div>
                        <div class="col-md-2 mx-0 rounded  bg-gradient-secondary d-flex ">
                            <dl>
                                <dt>Issuance of Dental Certificate</dt>
                                <dd class="mt-1">The dental clinic at ISAT U provides Dental Certificate to members of the student body,faculty,and local community</dd>
                            </dl>
                        </div>
                        <div class="col-md-2 mx-0 rounded  bg-gradient-secondary d-flex ">
                            <dl>
                                <dt>Precribing and Dispensing of Medecines</dt>
                                <dd class="mt-1">The dental clinic at ISAT U can prescribe and provide medicine to the student body,faculty,and local community</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once('footer.php'); ?>