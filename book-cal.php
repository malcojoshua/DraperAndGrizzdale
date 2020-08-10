<?php
include('utils.php');
include('header.php');
?>

<div class='container-fluid' style='margin-top:220px'>
<div class='form-row mt-3'>

 <div class='col-md-12'>
 <p class='my-5 bg-light p-3 text-center'>
 The system observes a 2-day lead time. If you need to speak with Claire urgently, please 
 <a href="contact.php">send us a message</a>
 </p>
 </div>

 <div class='col-md-6 text-right offset-md-6'><h4>
  <i class='btn text-muted fa fa-angle-left' onclick='mon(-1)'></i> 
  <span class='month'></span> 
  <i class='btn text-muted fa fa-angle-right' onclick='mon(1)'></i></h4>
 </div>
 <div class='col-md-12 table-responsive'>

 <table class='table bg-light table-sm table-bordered'>
  <thead class='today'><tr><th>SUN</th><th>MON</th><th>TUE</th><th>WED</th><th>THU</th><th>FRI</th><th>SAT</th></tr></thead>
  <tbody></tbody>
 </table>

 </div>
</div>
</div>

<form action='book-cal3.php' method='post' class='frm d-none'>
<input hidden name='Slot' id='Slot'>
</form>

<?php
include('footer.php');
?>
<script>
var $month = <?=date('n')?>;
var $year = <?=date('Y')?>;

const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

$(()=>{
 $('tbody').load('book-cal2.php', { month: $month, year: $year });
 showMonth();
});

function mon($d){
 $month += $d;
 if ($month == 0){ $month = 12; $year--; }
 if ($month == 13){ $month = 1; $year++; }
 $('tbody').html('<tr><td><div class="spinner-border"></div></td></tr>');
 $('tbody').load('book-cal2.php', { month: $month, year: $year });
 showMonth();
}

function showMonth(){
 const d = new Date($month + '/1/' + $year);
 $('.month').html( monthNames[d.getMonth()] + ' ' + $year );
}

function pick($slot, $el){
 $($el).html("<div class='spinner-border'></div>");
 $('#Slot').val($slot);
 $('.frm').submit();
}
</script>
<style>
th { width:14.3% !important; }
.slot { font-size: 80%; color:#888; cursor: pointer; }
.slot:hover { background: #ed8027; color:#fff; }
.today { background: #ffd; }
.past { background: #eee; }
th, td { text-align: center; }
</style>