CREATE OR REPLACE VIEW student_view AS
SELECT 	a.student_id, 
		a.serial_no, 
		a.student_name, 
		a.father_name, 
		a.mother_name, 
		a.mobile_number,
		a.nid,
        a.dateofbirth,
        a.admission_date,
		a.student_photo,
        GET_CURRENT_CLASS(A.STUDENT_ID) as class_name,
        GET_CURRENT_CLASSID(A.STUDENT_ID) as class_id,
        GET_CURRENT_DEPARTMENT(A.STUDENT_ID) AS department_name,
        GET_CURRENT_SEMESTER(A.STUDENT_ID) AS semester_name,
        GET_CURRENT_SEMESTERID(A.STUDENT_ID) as semester_id,
        LEFT(GET_CURRENT_YEAR(A.STUDENT_ID),4) as registration_year,
        substring(GET_CURRENT_YEAR(A.STUDENT_ID),-10) as registration_date,
        a.auth_code
FROM admissions a
 