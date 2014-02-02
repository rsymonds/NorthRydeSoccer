//************************************************************
// Menu variables
//************************************************************
var NoOfFirstLineMenus=15;         // Number of first level items
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
Menu1            = new Array("CLUB DETAILS","club_details.php","",3,20,135);
Menu1_1          = new Array("About",       "club_details_about.php","",0,20,64);
Menu1_2          = new Array("Contacts",    "club_details_contacts.php","",0);
Menu1_3          = new Array("History",     "club_details_history.php","",0);

Menu2            = new Array("NEWS","news.php","",0);

Menu3            = new Array("EVENTS","events.php","",1);
Menu3_1          = new Array("Olympics","events_olympics.php","",0,20,64);

Menu4            = new Array("TRAINING","training.php","",0);

Menu5            = new Array("OFFICIALS","officials.php","",0);

Menu6            = new Array("GROUNDS",          "grounds.php","",3);
Menu6_1          = new Array("Magdala",          "grounds_magdala.php","",0,20,116);
Menu6_2          = new Array("GHFA",             "grounds_ghfa.php","",0);
Menu6_3          = new Array("Maps & Directions","grounds_maps.php","",0);

Menu7            = new Array("CANTEEN", "","",1);
Menu7_1          = new Array("Roster",  "documents/library/NRSC_NRO_Draw_2012.xlsx","",0,20,116);

Menu8            = new Array("FIXTURES & RESULTS","results.php","",12);
Menu8_1          = new Array("Under 6",           "results_u6.php","",4,20,94);
Menu8_1_1        = new Array("Green A",             "results_u6.php#greena","",0,20,62);
Menu8_1_2        = new Array("Green B",          "results_u6.php#greenb","",0);
Menu8_1_3        = new Array("White A",           "results_u6.php#whitea","",0);
Menu8_1_4        = new Array("White B",           "results_u6.php#whiteb","",0);
Menu8_2          = new Array("Under 7",           "results_u7.php","",7);
Menu8_2_1        = new Array("Green A",             "results_u7.php#greena","",0,20,59);
Menu8_2_2        = new Array("Green B",             "results_u7.php#greenb","",0);
Menu8_2_3        = new Array("Red",             "results_u7.php#red","",0);
Menu8_2_4        = new Array("White A",           "results_u7.php#whitea","",0);
Menu8_2_5        = new Array("White B",           "results_u7.php#whiteb","",0);
Menu8_2_6        = new Array("Yellow A",           "results_u7.php#yellowa","",0);
Menu8_2_7        = new Array("Yellow B",           "results_u7.php#yellowb","",0);
Menu8_3          = new Array("Under 8",           "results_u8.php","",4);
Menu8_3_1        = new Array("Blue",             "results_u8.php#blue","",0,20,56);
Menu8_3_2        = new Array("Green",            "results_u8.php#green","",0);
Menu8_3_3        = new Array("Orange",            "results_u8.php#orange","",0);
Menu8_3_4        = new Array("Purple",               "results_u8.php#purple","",0);
Menu8_4          = new Array("Under 9",           "results_u9.php","",5);
Menu8_4_1        = new Array("Division 1",        "results_u9.php#div1","",0,20,68);
Menu8_4_2        = new Array("Division 3",        "results_u9.php#div3","",0);
Menu8_4_3        = new Array("Division 4",        "results_u9.php#div4","",0);
Menu8_4_4        = new Array("Division 6",        "results_u9.php#div6","",0);
Menu8_4_5        = new Array("Division 8",        "results_u9.php#div8","",0);
Menu8_5          = new Array("Under 10",          "results_u10.php","",4);
Menu8_5_1        = new Array("Division 1",        "results_u10.php#div1","",0,20,68);
Menu8_5_2        = new Array("Division 3",        "results_u10.php#div3","",0);
Menu8_5_3        = new Array("Division 6",        "results_u10.php#div6","",0);
Menu8_5_4        = new Array("Division 8",        "results_u10.php#div8","",0);
Menu8_6          = new Array("Under 11",          "results_u11.php","",1);
Menu8_6_1        = new Array("Division 6",        "results_u11.php#div6","",0,20,68);
Menu8_7          = new Array("Under 12",          "results_u12.php","",2);
Menu8_7_1        = new Array("Division 1",        "results_u12.php#div1","",0,20,68);
Menu8_7_2        = new Array("Division 3",        "results_u12.php#div3","",0);
Menu8_8          = new Array("Under 13",          "results_u13.php","",1);
Menu8_8_1        = new Array("Division 1",        "results_u13.php#div1","",0,20,68);
Menu8_9         = new Array("Under 14",          "results_u14.php","",1);
Menu8_9_1       = new Array("Division 2",        "results_u14.php#div2","",0,20,68);
Menu8_10         = new Array("Under 16",          "results_u16.php","",1);
Menu8_10_1       = new Array("Division 2",        "results_u16.php#div2","",0,20,68);
Menu8_11         = new Array("All Age",           "results_aa.php","",5);
Menu8_11_1       = new Array("Division 3",        "results_aa.php#div3","",0,20,76);
Menu8_11_2       = new Array("Division 5",        "results_aa.php#div5","",0);
Menu8_11_3       = new Array("Division 9",        "results_aa.php#div9","",0);
Menu8_11_4       = new Array("Division 17",       "results_aa.php#div17","",0);
Menu8_11_5       = new Array("Division 20",       "results_aa.php#div20","",0);
Menu8_12         = new Array("Over 35",           "results_o35.php","",3);
Menu8_12_1       = new Array("Division 1",        "results_o35.php#div1","",0,20,68);
Menu8_12_2       = new Array("Division 4",        "results_o35.php#div4","",0);
Menu8_12_3       = new Array("Division 5",        "results_o35.php#div5","",0);

Menu9            = new Array("MATCH REPORTS", "reports.php","",17);
Menu9_1          = new Array("14 Apr 2012",   "reports_20120414.php","",0,20,83);
Menu9_2          = new Array("21 Apr 2012",   "reports_20120421.php","",0,20,83);
Menu9_3          = new Array("28 Apr 2012",   "reports_20120428.php","",0,20,83);
Menu9_4          = new Array("05 May 2012",   "reports_20120505.php","",0,20,83);
Menu9_5          = new Array("12 May 2012",   "reports_20120512.php","",0,20,83);
Menu9_6          = new Array("19 May 2012",   "reports_20120519.php","",0,20,83);
Menu9_7          = new Array("26 May 2012",   "reports_20120526.php","",0,20,83);
Menu9_8          = new Array("02 Jun 2012",   "reports_20120602.php","",0,20,83);
Menu9_9          = new Array("09 Jun 2012",   "reports_20120609.php","",0,20,83);
Menu9_10         = new Array("23 Jun 2012",   "reports_20120623.php","",0,20,83);
Menu9_11         = new Array("30 Jun 2012",   "reports_20120630.php","",0,20,83);
Menu9_12         = new Array("07 Jul 2012",   "reports_20120707.php","",0,20,83);
Menu9_13         = new Array("14 Jul 2012",   "reports_20120714.php","",0,20,83);
Menu9_14         = new Array("21 Jul 2012",   "reports_20120721.php","",0,20,83);
Menu9_15         = new Array("28 Jul 2012",   "reports_20120728.php","",0,20,83);
Menu9_16         = new Array("04 Aug 2012",   "reports_20120804.php","",0,20,83);
Menu9_17         = new Array("11 Aug 2012",   "reports_20120811.php","",0,20,83);


Menu10           = new Array("GALLERIES",       "galleries.php","",1);
Menu10_1         = new Array("Pic of the Week", "galleries_pic_of_the_week.php","",0,20,104);

Menu11           = new Array("VIDEOS",         "videos.php","",0);

Menu12           = new Array("LIBRARY",                 "library.php","",6);
Menu12_1         = new Array("Registration Info",       "","",4,20,125);
Menu12_1_1       = new Array("2012 Rego Fees",          "documents/library/2012_registration_fees.pdf","",0,20,136);
Menu12_1_2       = new Array("2012 Rego Form",          "documents/library/2012_registration_form.pdf","",0);
Menu12_1_3       = new Array("2012 Insurance Form",     "documents/library/2012_insurance_form.pdf","",0);
Menu12_1_4       = new Array("FFA Rego Form",           "documents/library/ffa_registration_form.pdf","",0);
Menu12_2         = new Array("Substitution Sheets",     "","",5);
Menu12_2_1       = new Array("Four-a-Side",             "documents/library/substitution_sheet_4_a_side.pdf","",0,20,92);
Menu12_2_2       = new Array("Five-a-Side",             "documents/library/substitution_sheet_5_a_side.pdf","",0);
Menu12_2_3       = new Array("Seven-a-Side",            "documents/library/substitution_sheet_7_a_side.pdf","",0);
Menu12_2_4       = new Array("Nine-a-Side",             "documents/library/substitution_sheet_9_a_side.pdf","",0);
Menu12_2_5       = new Array("Eleven-a-Side",           "documents/library/substitution_sheet_11_a_side.pdf","",0);
Menu12_3         = new Array("Minis Ideas & Info",      "","",5);
Menu12_3_1       = new Array("Awards & Certificates",   "documents/library/award_certificate_ideas.doc","",0,20,150);
Menu12_3_2       = new Array("Certificate Template",    "documents/library/award_certificate_template.ppt","",0);
Menu12_3_3       = new Array("Player Of The Week",      "documents/library/award_player_of_the_week.pdf","",0);
Menu12_3_4       = new Array("Small Sided Game Guide",  "documents/library/small_sided_games_quick_guide.doc","",0);
Menu12_3_5       = new Array("Small Sided Game Hints",  "documents/library/small_sided_games_helpful_hints.pdf","",0);
Menu12_4         = new Array("Info for Officials",       "","",3);
Menu12_4_1       = new Array("Managers Duties - Minis", "documents/library/manager_duties_minis.doc","",0,20,148);
Menu12_4_2       = new Array("General Guidelines",      "documents/library/coaches_and_officials_guidelines.doc","",0);
Menu12_4_3       = new Array("Season Preparation",      "documents/library/coaches_and_managers_season_preparation.pdf","",0);
Menu12_5         = new Array("General Documents",       "","",4);
Menu12_5_1       = new Array("NRSC Declaration",        "documents/library/nrsc_declaration.pdf","",0,20,151);
Menu12_5_2       = new Array("WWC Declaration",         "documents/library/working_with_children_declaration.pdf","",0);
Menu12_5_3       = new Array("Code of Conduct",         "documents/library/code_of_conduct.pdf","",0);
Menu12_5_4       = new Array("Id Card Instructions",    "documents/library/id_card_instructions.pdf","",0);
Menu12_6         = new Array("Wet Weather",             "","",1);
Menu12_6_1       = new Array("Wet Weather Info",        "documents/library/wet_weather_information.doc","",0,20,118);

Menu13           = new Array("ARCHIVES",     "archives.php","",4);
Menu13_1         = new Array("2008",         "archives_2008.php","",5,20,42);
Menu13_1_1       = new Array("Events",       "archives/2008/events.html","",0,20,98);
Menu13_1_2       = new Array("Results",      "archives/2008/results.html","",0);
Menu13_1_3       = new Array("Match Reports","archives/2008/reports.html","",0);
Menu13_1_4       = new Array("Galleries",    "archives/2008/galleries.html","",0);
Menu13_1_5       = new Array("Videos",       "archives/2008/videos.html","",0);
Menu13_2         = new Array("2009",         "archives_2009.php","",5);
Menu13_2_1       = new Array("Events",       "archives/2009/events.html","",0,20,98);
Menu13_2_2       = new Array("Results",      "archives/2009/results.html","",0);
Menu13_2_3       = new Array("Match Reports","archives/2009/reports.html","",0);
Menu13_2_4       = new Array("Galleries",    "archives/2009/galleries.html","",0);
Menu13_2_5       = new Array("Videos",       "archives/2009/videos.html","",0);
Menu13_3         = new Array("2010",         "archives_2010.php","",5);
Menu13_3_1       = new Array("Events",       "archives/2010/events.html","",0,20,98);
Menu13_3_2       = new Array("Results",      "archives/2010/results.html","",0);
Menu13_3_3       = new Array("Match Reports","archives/2010/reports.html","",0);
Menu13_3_4       = new Array("Galleries",    "archives/2010/galleries.html","",0);
Menu13_3_5       = new Array("Documents",    "archives/2010/documents.html","",0);
Menu13_4         = new Array("2011",         "archives_2011.php","",4);
Menu13_4_1       = new Array("Events",       "archives/2011/events.html","",0,20,98);
Menu13_4_2       = new Array("Results",      "archives/2011/results.html","",0);
Menu13_4_3       = new Array("Match Reports","archives/2011/reports.html","",0);
Menu13_4_4       = new Array("Galleries",    "archives/2011/galleries.html","",0);

Menu14           = new Array("LINKS",                                                   "links.php","",13);
Menu14_1         = new Array("Gladesville Hornsby Football Association",                "http://www.ghfa.com.au/","",0,20,339);
Menu14_2         = new Array("North West Sydney Womens Football",                       "http://www.sportingpulse.com/assoc_page.cgi?assoc=6046&pID=1","",0);
Menu14_3         = new Array("Gladesville Ryde Magic Football Club",                    "http://www.gladesvillerydemagic.com","",0);
Menu14_4         = new Array("Sydney Football Club",                                    "http://www.sydneyfc.com/","",0);
Menu14_5         = new Array("Football NSW",                                            "http://www.footballnsw.com.au/","",0);
Menu14_6         = new Array("Football Federation Australia",                           "http://www.footballaustralia.com.au/","",0);
Menu14_7         = new Array("Hyundai A-League",                                        "http://www.a-league.com.au/","",0);
Menu14_8         = new Array("SBS The World Game",                                      "http://www.theworldgame.com.au/","",0);
Menu14_9         = new Array("BBC Sport - Football",                                    "http://news.bbc.co.uk/sport2/hi/football/default.stm","",0);
Menu14_10        = new Array("FIFA (F�d�ration Internationale de Football Association)","http://www.fifa.com/index.html","",0);
Menu14_11        = new Array("UEFA (Union of European Football Associations)",          "http://www.uefa.com/","",0);
Menu14_12        = new Array("English Premier League",                                  "http://www.premierleague.com/","",0);
Menu14_13        = new Array("Soccer Kickstart",                                        "http://www.soccerkickstart.com.au/","",0);

Menu15           = new Array("FAQS","faqs.php","",0);