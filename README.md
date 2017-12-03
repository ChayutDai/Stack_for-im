# Stack_for-im
เว็บไซต์จำลองการทำงานของ data structure ชื่อ Stack

(PHP, MySQL, Codeigniter Framwork)

###Installation

1. ติดตั้ง XAMP 
2. Dowload หรือ Clone Resposit ลงที่ part  xamp/htdoc 
3. สร้าง Database ชื่อ Stack 
4. Import Database โดยไฟล์ stack.sql 
5. Config สำหรับติดต่อกับ Database ที่ไฟล์ stack/config/Database.php
6. Config Usr_site สำหรับคนไม่ใช้ localhost
7. Finish

###Concept Database

- data structure Stack ลักษณะแบบ array

value  | index array
------------- | -------------
6  | array[6],|<---- top
5  | array[5] 
4  | array[4] 
3  | array[3] 
2  | array[2] 
1  | array[1] 

- สมมุติ Push(7)

value  | index array
------------- | -------------
7 | array[7]|<---- top
6  | array[6]
5  | array[5] 
4  | array[4] 
3  | array[3] 
2  | array[2] 
1  | array[1] 

- สมมุติ Pop(7)

value  | index array
------------- | -------------
6  | array[6]
5  | array[5] 
4  | array[4] 
3  | array[3] 
2  | array[2] 
1  | array[1] 

- สมมุติ Speacial(7,4) insert ค่า 7 หลัง index ที่ 4 

value  | index array  | |value  | index array|  |value  | index array| 
------------- | -------------
6  | array[6] | |6  | array[7] (+1)||6  | array[7]
5  | array[5] ||5  | array[6] (+1)||5  | array[6]
4  | array[4] |->|4  | array[5] (+1) |->|4  | array[5]  
3  | array[3] ||3  | array[6] ||7  | array[4] (New)
2  | array[2] ||2  | array[6] ||3  | array[3] 
1  | array[1] ||1  | array[6] ||2  | array[2] 
    |               ||   |               | |1  | array[1] 

###Function
- Push()

- Pop()

- Speacial
