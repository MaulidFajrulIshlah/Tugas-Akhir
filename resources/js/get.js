<script>
    const matkul = [];
    $.ajax({
type: 'GET',
dataType:"json",
url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',

success: function (data, status, xhr) {
for(let i = 0; i < data.length; i++){
    if(data[i]['categoryid'] == 16 ){
        matkul.push(data[i]['fullname']);
        
    }  //for 
}// if
console.log(matkul);
}// success: function
});
</script>