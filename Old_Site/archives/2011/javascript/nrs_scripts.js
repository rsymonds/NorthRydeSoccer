<!-- Start

//************************************************************
// Load reports
//************************************************************

function loadReports()
{
  var selectId = document.getElementById("reportList");

  addReport(selectId,"","Select another match report");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20110402.html","02 April 2011");
  addReport(selectId,"reports_20110409.html","09 April 2011");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20110507.html","07 May 2011");
  addReport(selectId,"reports_20110514.html","14 May 2011");
  addReport(selectId,"reports_20110521.html","21 May 2011");
  addReport(selectId,"reports_20110528.html","28 May 2011");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20110604.html","04 June 2011");
  addReport(selectId,"reports_20110611.html","11 June 2011");
  addReport(selectId,"reports_20110625.html","25 June 2011");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20110702.html","02 July 2011");
  addReport(selectId,"reports_20110709.html","09 July 2011");
  addReport(selectId,"reports_20110716.html","16 July 2011");
  addReport(selectId,"reports_20110730.html","30 July 2011");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20110806.html","06 August 2011");
  addReport(selectId,"reports_20110813.html","13 August 2011");
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