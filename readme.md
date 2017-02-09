Please run the following commands in order
##First you will see a page with a success message and an empty array called notes
1) curl --user admin:admin 204.236.210.74/api/v1/user/1/note  
## Now you have will create a note  
2) curl --user admin:admin -d 'message=thisismyfirstmessage&tags=tag1,tag2,tag3'  204.236.210.74/api/v1/user/1/note
## Now if you visit the same url as before you should see a list of all of your notes
3) curl --user admin:admin 204.236.210.74/api/v1/user/1/note
## Now you can visit the individual note
4) curl --user admin:admin 204.236.210.74/api/v1/user/1/note/1
## Now you can update the messsage body and the tags of a single note
5) curl -i -X PUT --user admin:admin -d ‘message=Updated Title' 204.236.210.74/api/v1/user/1/note/1
## Now you can delete the note
6) curl -i -X DELETE --user admin:admin 204.236.210.74/api/v1/user/1/note/1
## Now you should see the page with the success message and an empty array called notes again
7) curl --user admin:admin 204.236.210.74/api/v1/user/1/note 

Alternatively, you can run the same crud commands using POSTMAN
