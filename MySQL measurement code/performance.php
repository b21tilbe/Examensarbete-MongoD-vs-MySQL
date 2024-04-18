<?php

echo '<script>
    let iterations=10;

    function savetime()
    { 
        let old=performance.now();
        
        var arr=[];
        var it=100000+Math.round(Math.random()*100000);
        for(var i=0;i<it;i++){
            arr.push(Math.round(Math.random()*5000));
        }
        arr.sort();
        
        let measurement=performance.now();
    
        cnt=parseInt(localStorage.getItem("Counter"));

        if(cnt>iterations){
            alert("Finished!"+cnt);
        }else{
            if(isNaN(cnt)) cnt=0;

            var delta=measurement-old;
            var str=localStorage.getItem("theData");
            str+=old+","+measurement+","+delta+"\n";
        
            if(cnt==0){
                str="data:text/csv;charset=utf-8,";
            }
        
            cnt++;
            localStorage.setItem("Counter",cnt);
            localStorage.setItem("theData",str);
        
            location.reload(); 
        }
    }

    function getData()
    {
        var str=localStorage.getItem("theData");

        var anchor = document.createElement("a");
        anchor.setAttribute("href", encodeURI(str));
        anchor.setAttribute("download", "my_data.csv");
        anchor.innerHTML= "Click Here to download";
        document.body.appendChild(anchor);
        anchor.click();
    }
</script>';
?>
