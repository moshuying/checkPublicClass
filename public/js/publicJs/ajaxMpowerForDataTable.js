function MdownloadInfo(className,classID,author,number,classRoom) {
    var xhr = new XMLHttpRequest(),
        url = 'http://data.twogether.cn/ChooseClass/ajax/ajaxMDownloadClassHuman.php',
        fileName = className + "学生信息";
    xhr.open('GET', url + "?classID=" + classID, !0);
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 304)) {
            var jsonDATA = eval(this.responseText);
            // console.log(jsonDATA[2]['username']);
            JSONToExcelConvertor(jsonDATA, fileName,author,number,classRoom);
        }
    }

}
//写入excel(jsonData主体字符串,生成的文件名,主讲人,课程人数 )
function JSONToExcelConvertor(JSONData, FileName, author,number,classRoom) {
    //先转化json
    var arrData = JSONData; 
    var excel='';
    
    for (var i in arrData) {
        var value=`\n   <Row ss:AutoFitHeight="0" ss:Height="26.25">
        <Cell ss:StyleID="s20"/>\n`;
        value += '\n<Cell ss:StyleID="s20"><Data ss:Type="Number">' + arrData[i]['username']  + "</Data></Cell>";
        value += '\n<Cell ss:StyleID="s16"><Data ss:Type="String">' + arrData[i]['xingming']  + "</Data></Cell>";
        value += '\n<Cell ss:StyleID="s16"><Data ss:Type="String">' + arrData[i]['banji']     + "</Data></Cell>";
        value += '\n<Cell ss:StyleID="s16"><Data ss:Type="String">' + arrData[i]['zhuanye']   + "</Data></Cell>";
        value+=`    <Cell ss:StyleID="s17"/>
        </Row>`;
        excel += value;
    }
    //时间戳
    function TimesTempToTime() { 
        var date = new Date(Date.now());
        var Y = date.getFullYear() + '-'; 
        var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-'; 
        var D = date.getDate() < 10 ? '0'+date.getDate()+ 'T' : date.getDate()+ 'T'; 
        var h = date.getHours() < 10 ? '0'+date.getHours()+ ':' : date.getHours()+ ':'; 
        var m = date.getMinutes() < 10 ? '0'+date.getMinutes()+ ':' : date.getMinutes()+ ':'; 
        var s = date.getSeconds()< 10 ? '0'+date.getSeconds() : date.getSeconds(); 
        return Y+M+D+h+m+s; } 
    var times=TimesTempToTime();
    var head='<'+'?'+'x'+'m'+'l'+' '+'version='+`"1.0"?>`+'<'+'?'+`mso-application progid="Excel.Sheet"?>`;
    var excelFile = head+`<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
     xmlns:o="urn:schemas-microsoft-com:office:office"
     xmlns:x="urn:schemas-microsoft-com:office:excel"
     xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
     xmlns:html="http://www.w3.org/TR/REC-html40">
     <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
     <Title>学生信息表by墨抒颖</Title>
      <Created>`+times+`Z</Created>
      <LastSaved>`+times+`Z</LastSaved>
      <Version>16.00</Version>
     </DocumentProperties>
     <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
      <AllowPNG/>
      <RemovePersonalInformation/>
     </OfficeDocumentSettings>
     <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
      <WindowHeight>12645</WindowHeight>
      <WindowWidth>22260</WindowWidth>
      <WindowTopX>32767</WindowTopX>
      <WindowTopY>32767</WindowTopY>
      <ProtectStructure>False</ProtectStructure>
      <ProtectWindows>False</ProtectWindows>
     </ExcelWorkbook>
     <Styles>
      <Style ss:ID="Default" ss:Name="Normal">
       <Alignment ss:Vertical="Bottom"/>
       <Borders/>
       <Font ss:FontName="等线" x:CharSet="134" ss:Size="11" ss:Color="#000000"/>
       <Interior/>
       <NumberFormat/>
       <Protection/>
      </Style>
      <Style ss:ID="s16">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
       <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="12" ss:Color="#212529"/>
       <Interior ss:Color="#FFFFFF" ss:Pattern="Solid"/>
      </Style>
      <Style ss:ID="s17">
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
      </Style>
      <Style ss:ID="s18">
       <Alignment ss:Horizontal="Center" ss:Vertical="Center" ss:WrapText="1"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
       <Font ss:FontName="Arial" x:Family="Swiss" ss:Size="14" ss:Color="#212529"
        ss:Bold="1"/>
       <Interior ss:Color="#FFFFFF" ss:Pattern="Solid"/>
      </Style>
      <Style ss:ID="s20">
       <Alignment ss:Vertical="Center"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
      </Style>
      <Style ss:ID="s21">
       <Alignment ss:Horizontal="Center" ss:Vertical="Top" ss:WrapText="1"/>
       <Borders>
        <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
        <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
       </Borders>
       <Font ss:FontName="等线" x:CharSet="134" ss:Size="14" ss:Color="#000000"
        ss:Bold="1"/>
      </Style>
     </Styles>
     <Worksheet ss:Name="Sheet1">
      <Table ss:ExpandedColumnCount="6" ss:ExpandedRowCount="28" x:FullColumns="1"
       x:FullRows="1" ss:DefaultColumnWidth="54" ss:DefaultRowHeight="14.25">
       <Column ss:Index="2" ss:AutoFitWidth="0" ss:Width="100.5"/>
       <Column ss:AutoFitWidth="0" ss:Width="87.75"/>
       <Column ss:AutoFitWidth="0" ss:Width="118.5"/>
       <Column ss:AutoFitWidth="0" ss:Width="146.25"/>
       <Column ss:AutoFitWidth="0" ss:Width="90.75"/>
       <Row ss:AutoFitHeight="0" ss:Height="42">
        <Cell ss:MergeAcross="5" ss:StyleID="s21"><ss:Data ss:Type="String"
          xmlns="http://www.w3.org/TR/REC-html40"><B><Font html:Color="#000000">`+FileName+`报名人数公布&#10;</Font><Font
            html:Color="#FF0000">注意:请各位同学注意查看开课时间和开课地点。提前准备好U盘用于拷贝资料。</Font></B></ss:Data></Cell>
       </Row>
       <Row ss:Height="18">
        <Cell ss:StyleID="s20"><Data ss:Type="String">`+classRoom+`</Data></Cell>
        <Cell ss:StyleID="s18"><Data ss:Type="String">学号</Data></Cell>
        <Cell ss:StyleID="s18"><Data ss:Type="String">姓名</Data></Cell>
        <Cell ss:StyleID="s18"><Data ss:Type="String">专业</Data></Cell>
        <Cell ss:StyleID="s18"><Data ss:Type="String">年级班级</Data></Cell>
        <Cell ss:StyleID="s18"><ss:Data ss:Type="String"
          xmlns="http://www.w3.org/TR/REC-html40"><B><Font html:Face="等线"
            x:CharSet="134" html:Color="#212529">签到</Font></B></ss:Data></Cell>
       </Row>`;
    excelFile += excel;
    //文件结尾
    excelFile +=`  </Table>
    <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
     <PageSetup>
      <Header x:Margin="0.3"/>
      <Footer x:Margin="0.3"/>
      <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
     </PageSetup>
     <Unsynced/>
     <FitToPage/>
     <Print>
      <ValidPrinterInfo/>
      <PaperSizeIndex>9</PaperSizeIndex>
      <Scale>86</Scale>
      <HorizontalResolution>600</HorizontalResolution>
      <VerticalResolution>600</VerticalResolution>
     </Print>
     <Selected/>
     <Panes>
      <Pane>
       <Number>3</Number>
       <ActiveRow>2</ActiveRow>
       <ActiveCol>12</ActiveCol>
      </Pane>
     </Panes>
     <ProtectObjects>False</ProtectObjects>
     <ProtectScenarios>False</ProtectScenarios>
    </WorksheetOptions>
   </Worksheet>
  </Workbook>
  `;
    var uri = 'data:application/vnd.ms-excel;charset=utf-8,' + encodeURIComponent(excelFile);
    var link = document.createElement("a");
    link.href = uri;
    link.style = "visibility:hidden";
    link.download = author+" "+FileName + ".xls";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}