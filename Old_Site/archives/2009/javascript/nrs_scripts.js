<!-- Start

//************************************************************
// Load reports
//************************************************************

function loadReports()
{
  var selectId = document.getElementById("reportList");

  addReport(selectId,"","Select another match report");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20090418.html","18 April 2009");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20090502.html","02 May 2009");
  addReport(selectId,"reports_20090509.html","09 May 2009");
  addReport(selectId,"reports_20090516.html","16 May 2009");
  addReport(selectId,"reports_20090530.html","30 May 2009");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20090606.html","06 June 2009");
  addReport(selectId,"reports_20090613.html","13 June 2009");
  addReport(selectId,"reports_20090620.html","20 June 2009");
  addReport(selectId,"reports_20090627.html","27 June 2009");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20090704.html","04 July 2009");
  addReport(selectId,"reports_20090711.html","11 July 2009");
  addReport(selectId,"reports_20090718.html","18 July 2009");
  addReport(selectId,"reports_20090725.html","25 July 2009");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20090801.html","01 August 2009");
  addReport(selectId,"reports_20090808.html","08 August 2009");
  addReport(selectId,"reports_20090815.html","15 August 2009");
}

//************************************************************
// Report functions
//************************************************************

function addReport(selectId,value,text)
{
  var opt = document.createElement("option");
  opt.value = value;
  opt.text = text;
  selectId.add(opt);
}

function openReportList()
{
  var selectId = document.getElementById("reportList");
  var url = selectId.options[selectId.selectedIndex].value;

  if (url != "")
  {
    window.location.assign(url);
  }
}

End -->