//************************************************************
// Menu variables
//************************************************************
var NoOfFirstLineMenus=2;         // Number of first level items
var LowBgColor='#003399';          // Background color when mouse is not over
var LowSubBgColor='#003399';       // Background color when mouse is not over on subs
var HighBgColor='#ffd700';         // Background color when mouse is over
var HighSubBgColor='#ffd700';      // Background color when mouse is over on subs
var FontLowColor='#ffd700';        // Font color when mouse is not over
var FontSubLowColor='#ffd700';     // Font color subs when mouse is not over
var FontHighColor='#000000';       // Font color when mouse is over
var FontSubHighColor='#000000';    // Font color subs when mouse is over
var BorderColor='#255282';         // Border color
var BorderSubColor='#255282';      // Border color for subs
var BorderWidth=1;                 // Border width
var BorderBtwnElmnts=1;            // Border between elements 1 or 0
var FontFamily="verdana,helvetica,arial,sans-serif"  // Font family menu items
var FontSize=7.5;                  // Font size menu items
var FontBold=1;                    // Bold menu items 1 or 0
var FontItalic=0;                  // Italic menu items 1 or 0
var MenuTextCentered='left';       // Item text position: left, center or right
var MenuCentered='left';           // Menu horizontal position 'left', 'center' or 'right'
var MenuVerticalCentered='top';    // Menu vertical position 'top', 'middle','bottom' or static
var ChildOverlap=0;                // horizontal overlap
var ChildVerticalOverlap=0;        // vertical overlap
var StartTop=170;                  // Menu offset x coordinate
var StartLeft=0;                   // Menu offset y coordinate
var VerCorrect=0;                  // Multiple frames y correction
var HorCorrect=0;                  // Multiple frames x correction
var LeftPaddng=6;                  // Left padding
var TopPaddng=3;                   // Top padding
var FirstLineHorizontal=0;         // set to 1 for horizontal menu, 0 for vertical
var MenuFramesVertical=1;          // Frames in cols or rows 1 or 0
var DissapearDelay=400;            // delay before menu folds in
var TakeOverBgColor=1;             // Menu frame takes over background color subitem frame
var FirstLineFrame='navig';        // Frame where first level appears
var SecLineFrame='space';          // Frame where sub levels appear
var DocTargetFrame='space';        // Frame where target documents appear
var TargetLoc='';                  // span id for relative positioning
var HideTop=0;                     // Hide first level when loading new document 1 or 0
var MenuWrap=1;                    // enables/disables menu wrap
var RightToLeft=0;                 // enables/disables right to left unfold 1 or 0
var UnfoldsOnClick=0;              // Level 1 unfolds onclick/onmouseover
var WebMasterCheck=0;              // menu tree checking
var ShowArrow=0;                   // Enable arrow images
var KeepHilite=1;                  // Keep selected path highligthed
var Arrws=['right.gif',5,10,'down.gif',10,5,'left.gif',5,10]; // Arrow source, width and height

//************************************************************
// User-defined functions
//************************************************************
function BeforeStart(){return}
function AfterBuild(){return}
function BeforeFirstOpen(){return}
function AfterCloseAll(){return}

//************************************************************
// Menu(n) = new Array(text,link,image,#submenus,height,width)
// For rollover images set text to: "rollover:image1:image2"
//************************************************************
Menu1            = new Array("News","newsadmin.php","",0,20,116);

Menu2            = new Array("Home Page","homeadmin.php","",0,20,116);

Menu3            = new Array("Draw Upload","Drawadmin.php","",0,20,116);