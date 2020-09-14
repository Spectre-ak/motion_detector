import cv2
#motion detection using opencv and writing in a video
vid=cv2.VideoCapture('/content/videoplayback .mp4')
frame_width = int(vid.get(3))# 3 to get the width
frame_height = int(vid.get(4))# 4 to get the height and 5 to get the fps of the image
out = cv2.VideoWriter('motion_road1.avi',cv2.VideoWriter_fourcc('M','J','P','G'), int(vid.get(5)), (frame_width,frame_height))
ret,frame1=vid.read()
ret,frame2=vid.read()

while True:
  diff=cv2.absdiff(frame1,frame2)
  gray_diff=cv2.cvtColor(diff,cv2.COLOR_BGR2GRAY)
  blur=cv2.GaussianBlur(gray_diff,(5,5),0)
  _,thresh=cv2.threshold(blur,20,255,cv2.THRESH_BINARY)
  dilated_img=cv2.dilate(thresh,None,iterations=3)
  countors,_=cv2.findContours(dilated_img,cv2.RETR_TREE,cv2.CHAIN_APPROX_SIMPLE)
  #cv2.drawContours(frame1,countors,-1,(0,255,0),2)
  for cont in countors:
    x,y,w,h=cv2.boundingRect(cont)
    if cv2.contourArea(cont)>800:
      cv2.rectangle(frame1,(x,y),(x+w,y+h),(0,255,0),2)
  out.write(frame1)
  frame1=frame2
  ret,img=vid.read()
  frame2=img
  if not ret:
    break
