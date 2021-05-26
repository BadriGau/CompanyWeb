const express = require('express');
const app = express();

const server = app.listen(3000, function(){
 console.log("servidor a funcionar na porta %s", server.address().port);
}); 
//app.use("/login",express.static("Index"));// it use the /login to get the file inside the index folder
app.use(express.static("Pages")); //it only defines the folder to use
//app.use(express.static("Bootstrap"));
app.get("/", function(request,response){
    response.send("hello world");
})
app.get("/app",function(request,response){
response.redirect('http://localhost:8080/final%20project/');
   // response.sendFile("/Index.html",{ root: __dirname });  //it use the index.html file from index folder
})
app.get("/team",function(request,response){
    response.sendFile("team.html",{ root: __dirname });  //it use the team.html file from index folder
})
app.get("/project",function(request,response){
    response.sendFile("project.html",{ root: __dirname });  //it use the about.html file from index folder
})