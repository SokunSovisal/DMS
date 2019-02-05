<style type="text/css">
  #company_info table tr td{
    padding: 10px;
  }

  tbody tr{
    cursor: pointer;
  }
  tbody tr > td{
    padding: 5px !important;
    /*border: 1px solid red;*/
  }
</style>

<div class="page-categories">
  <a href="index.php?action=detail&id=<?=$tr_company?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;ត្រលប់ក្រោយ</a>

  <h3 class="title text-center"><?= $co_name_kh ?></h3>
  <br />
  <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#checklist" role="tablist">
        <i class="material-icons">check_box</i> ឯកសារតម្រូវ
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#company_info" role="tablist">
        <i class="fa fa-project-diagram"></i> ជំហាន
      </a>
    </li>
  </ul>
  <br/>
  <div class="tab-content tab-space tab-subcategories">
    <div class="tab-pane active" id="checklist">
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
    <div class="tab-pane" id="company_info">
      <ul class="timeline timeline-simple">
        <li class="timeline-inverted">
          <div class="timeline-badge success">
            <i class="material-icons">extension</i>
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <span class="badge badge-pill badge-success">Another One</span>
            </div>
            <div class="timeline-body">
              <p>Thank God for the support of my wife and real friends. I also wanted to point out that it’s the first album to go number 1 off of streaming!!! I love you Ellen and also my number one design rule of anything I do from shoes to music to homes is that Kim has to like it....</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge info">
            <i class="material-icons">fingerprint</i>
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <span class="badge badge-pill badge-info">Another Title</span>
            </div>
            <div class="timeline-body">
              <p>Called I Miss the Old Kanye That’s all it was Kanye And I love you like Kanye loves Kanye Famous viewing @ Figueroa and 12th in downtown LA 11:10PM</p>
              <p>What if Kanye made a song about Kanye Royère doesn't make a Polar bear bed but the Polar bear couch is my favorite piece of furniture we own It wasn’t any Kanyes Set on his goals Kanye</p>
              <hr>
            </div>
            <div class="timeline-body">
              <p>Called I Miss the Old Kanye That’s all it was Kanye And I love you like Kanye loves Kanye Famous viewing @ Figueroa and 12th in downtown LA 11:10PM</p>
              <p>What if Kanye made a song about Kanye Royère doesn't make a Polar bear bed but the Polar bear couch is my favorite piece of furniture we own It wasn’t any Kanyes Set on his goals Kanye</p>
              <hr>
            </div>
            <div class="timeline-body">
              <p>Called I Miss the Old Kanye That’s all it was Kanye And I love you like Kanye loves Kanye Famous viewing @ Figueroa and 12th in downtown LA 11:10PM</p>
              <p>What if Kanye made a song about Kanye Royère doesn't make a Polar bear bed but the Polar bear couch is my favorite piece of furniture we own It wasn’t any Kanyes Set on his goals Kanye</p>
              <hr>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function getTrid(id) {
    window.location.replace("?action=detail&id="+id);
  }
</script>