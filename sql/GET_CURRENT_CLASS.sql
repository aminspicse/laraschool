CREATE DEFINER=`root`@`localhost` FUNCTION `GET_CURRENT_CLASS`(ID varchar(20)) RETURNS varchar(100) CHARSET utf8
BEGIN
declare
CLASS_NAME VARCHAR(100);
	SELECT CLASS_ID FROM studentregistrations where student_id=ID 
    
    INTO CLASS_NAME;
RETURN CLASS_NAME;
END