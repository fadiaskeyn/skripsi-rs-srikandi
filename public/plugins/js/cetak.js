import jsPDF from 'jspdf'
import 'jspdf-autotable'

function generate(){
    var doc = new jsPDF('p', 'pt', 'letter');
    var htmlstring = '';
    var tempVarToCheckPageHeight = 0;
    var pageHeight = 0;
pageHeight = doc.internal.pageSize.height;
specialElementHandler = {

    '#bypassme':function (element, renderer){
        return true;
    }
};
margin = {
    top:150,
    bottom: 60,
    left: 40,
    right: 40,
    width: 600
};
var y = 20;
doc.setLineWidth(2);
doc.text(200, y = y+30, "Cencus Harian");
doc.autoTable({
    html: '#tabelcencus',
    startY: 70,
    theme: 'grid',
    ColumnStyle: {
        0:{
            cellwidth:180,
        },
        1: {
            cellwidth: 180,
        },
        2: {
            cellwidth: 180,
        }
    },
    styles:{
        minCellHeight:40
    }
})
doc.save('Cencus_Harian.pdf');
}
