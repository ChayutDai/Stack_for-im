# Stack_for-im
เว็บไซต์จำลองการทำงานของ data structure ชื่อ Stack

(PHP, MySQL, Codeigniter Framwork)

####Installation

1. ติดตั้ง XAMP 
2. Dowload หรือ Clone repository ลงที่ part  C:\xampp\htdocs
3. สร้าง Database ชื่อ Stack 
4. Import Database โดยไฟล์ stack.sql 
5. Config สำหรับติดต่อกับ Database ที่ไฟล์ stack/config/Database.php
6. Config Usr_site สำหรับคนไม่ใช้ localhost
7. Finish

####Concept Database

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

- สมมุติ Special(7,4) insert ค่า 7 หลัง index ที่ 4 


value  | index array  | 
------------- | -------------
6  | array[7] (+1)
5  | array[6] (+1)
4  | array[5] (+1) 
7  | array[4] (New)
3  | array[3] 
2  | array[2] 
1  | array[1]


####Function
- Push()
```php
public function push(){

    // รับค่าที่ input เข้ามา  
        $value = $this->input->post('value'); 

    // หาค่า top ของ stack ปัจจุบัน (index array มากที่สุด)     
        $this->load->model('m_stack');
        $num_stack = $this->m_stack->count_stack();

    // เพิ่มค่า top สำหรับ stack ใหม่
        $num_stack++;

    // Insert
        $result = $this->m_stack->insert_stack($value,$num_stack++);
}        
```
 
- Pop()
```php
public function pop(){

    // ลบ แถวที่มีค่า array มากที่สุด
        $this->load->model('m_stack');
        $result = $this->m_stack->delete_stack();
   
    }
```
- Speacial
```php
public function special(){

	// รับ input index ที่จะแทรก และค่า(value)ที่จะแทรก
		$index = $this->input->post('index');
		$value = $this->input->post('value');
	//  Update and Insert
        $this->load->model('m_stack');
        $result = $this->m_stack->insert_special_stack($index,$value);
 		 // 1. เพิ่มค่า array index ที่มากกว่า ค่า index ที่ได้ get มา จากบรรทัดบน
		 // 2. Iinsert value และ index เข้าไป  
}
```