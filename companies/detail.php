<style type="text/css">
  #company_info table tr td{
    padding: 10px;
  }
  tbody tr > td{
    padding: 5px !important;
  }
</style>

<div class="page-categories">
	 <?php include('../layout/comps/back.php'); ?>

  <h3 class="title text-center"><?= $co_name_kh ?></h3>
  <br />
  <ul class="nav nav-pills nav-pills-info nav-pills-icons justify-content-center" role="tablist">
    <li class="nav-item">
      <a class="nav-link <?= (!isset($_GET['tab'])? 'active':'' ) ?>" data-toggle="tab" href="#checklist" role="tablist">
        <i class="material-icons">check_box</i> ឯកសារតម្រូវ
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= (($_GET['tab']=='step')? 'active':'' ) ?>" data-toggle="tab" href="#tr_steps" role="tablist">
        <i class="fa fa-project-diagram"></i> ជំហាន
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= (($_GET['tab']=='info')? 'active':'' ) ?>" data-toggle="tab" href="#company_info" role="tablist">
        <i class="material-icons">info</i> ពត៌មានក្រុមហ៊ុន
      </a>
    </li>
  </ul>
  <br/>
  <div class="tab-content tab-space tab-subcategories">
    <div class="tab-pane  <?= (!isset($_GET['tab'])? 'active':'' ) ?>" id="checklist">
      <div class="row">
        <div class="col-sm-12">
          <div class="bg-white-content">
            <div class="vs-datatable">
              <br/>
              <table class="table table-hover table-striped" width="100%">
                <thead>
                  <tr>
                    <th width="5%" class="disabled-sorting text-center">ល.រ</th>
                    <th>ការបរិច្ឆេទ</th>
                    <th>ឈ្មោះ</th>
                    <th width="8%" class="disabled-sorting text-center border-lr">ឯកសារ</th>
                    <th width="25%">&nbsp;ចំណាំ</th>
                    <th>គ្រប់គ្រងដោយ</th>
                    <th width="8%" class="disabled-sorting text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?= @$tbody ?>
                </tbody>
              </table>
              <br/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane <?= (($_GET['tab']=='step')? 'active':'' ) ?>" id="tr_steps">
      <ul class="timeline timeline-simple mt-0">
        <?= $steps ?>
      </ul>
    </div>
    <div class="tab-pane <?= (($_GET['tab']=='info')? 'active':'' ) ?>" id="company_info">
      <div class="bg-white-content">
        <table class="">
          <tbody>
            <tr>
              <td colspan="2"><h3 class="mt-4">ព័ត៌មានចំបង</h3></td>
            </tr>
            <tr>
              <td width="20%"><strong>ឈ្មោះជាភាសាខ្មែរ</strong></td>
              <td><strong>: </strong><?= $co_name_kh ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>ឈ្មោះជាភាសាអង់គ្លេស</strong></td>
              <td><strong>: </strong><?= $co_name_en ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>ថ្ងៃចុះឈ្មោះ</strong></td>
              <td><strong>: </strong><?= date('d-M-Y', strtotime($co_register_date)) ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>ប្រភេទអាជីវកម្ម</strong></td>
              <td><strong>: </strong><?= $co_type ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>លេខអត្តសញ្ញាណកម្មសារពើពន្ធ</strong></td>
              <td><strong>: </strong><?= $co_vat_no ?></td>
            </tr>
            <tr>
              <td colspan="2"><h3 class="mt-4">ព័ត៌មានផ្សេងៗ</h3></td>
            </tr>
            <tr>
              <td width="20%"><strong>លេខទូរស័ព្ទ</strong></td>
              <td><strong>: </strong><?= $co_phone ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>អ៊ីមែល</strong></td>
              <td><strong>: </strong><?= $co_email ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>អាសយដ្ឋាន</strong></td>
              <td><strong>: </strong><?= $co_address ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>គ្រប់គ្រងដោយ</strong></td>
              <td><strong>: </strong><?= $co_em_id ?></td>
            </tr>
            <tr>
              <td width="20%"><strong>បរិយាយ</strong></td>
              <td><strong>: </strong><?= $co_description ?></td>
            </tr>
            <tr>
              <td colspan="2"><h5 class="mt-4">លុបក្រុមហ៊ុន</h5></td>
            </tr>
            <tr>
              <td><button type="button" onclick="getId(<?= $co_id ?>)" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-block"><i class="fa fa-trash-alt"></i> &nbsp;&nbsp;Delete</button></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- small modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        តើអ្នកពឹតជាចង់ធ្វើសកម្មភាពមួយនេះមែនទេ?
      </div>
      <div class="modal-body delete">
        <div class="form-group mt-2">
          <input type="hidden" id="co_id" value="<?= $co_id ?>" />
          <label for="">បញ្ចាក់ពាក្យសម្ងាត់!</label>
          <input type="password" class="form-control" placeholder="បញ្ចូលពាក្យសម្ងាត់របស់អ្នក" required="true" name="user_password" id="user_password" autocomplete="off" />
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" data-dismiss="modal">អត់ទេ</button>
        <button type="button" id="delete_company" class="btn btn-success">យល់ព្រម</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="main_modal">
  <div class="modal-dialog modal-dialog-centered" style="min-width: 70%;">
    <div class="modal-content">
      <iframe id="main_frame" frameborder="0" style="width: 100%; min-height: 415px;"></iframe>
    </div>
  </div>
</div>

<script type="text/javascript">


  function getTdid(id){
    document.getElementById('main_frame').src='edit_td.php?td_id='+id+"&tr_id=$_GET['tr_id']";
  }

  $('#main_modal').on('hidden.bs.modal', function () {
    window.location.replace("index.php?action=detail&tr_id=<?= $_GET['tr_id'] ?>");
  })



  $('#delete_company').click( function () {
    var user_password = $('#user_password').val();
    var co_id = $('#co_id').val();
    $.ajax({
      url: '../ajax/checkPassword.php',
      type: 'post',
      data: {method: 'fetch', user_password: user_password},
      success: function(dataReturn){
        // alert(dataReturn);
        var data = dataReturn.split(";:;");
        if (data[0]=='success') {
          window.location.replace("?action=deletecompany&co_id="+co_id);
        }else{
          if ($('.modal-body.delete').find('div.alert-danger').length == 0) {
            $('.modal-body.delete').prepend(data[1]);
          }
        }
      }
    });
  });

</script>