-- 建立資料庫
-- CREATE DATABASE MIS;

-- 移除資料庫
-- DROP DATABASE MIS;

-- 建立新帳號
-- CREATE USER 'mis'@'%' IDENTIFIED BY 'PASSW0rd';

-- 移除帳號
-- DROP USER 'mis'@'%';

-- 資料庫授權
-- GRANT ALL PRIVILEGES ON MIS.* TO 'mis'@'%';

-- 移除授權
-- REVOKE ALL PRIVILEGES ON MIS.* FROM 'mis'@'%';

-- 更新授權
-- FLUSH PRIVILEGES;

USE `MIS`;

/******************
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE `EMPLOYEE`, `ORGANIZATION`, `SCHEDUL`, `DUTY`, `LEAVE`, `DUTYRULE`, `LEAVERULE`, `REGULATION`;
 ******************/

CREATE TABLE `EMPLOYEE` (
	EmpID CHAR(6) NOT NULL PRIMARY KEY COMMENT '員工編號',
    EmpName VARCHAR(40) NOT NULL COMMENT '員工姓名',
    OrgID CHAR(5) COMMENT '部門代碼',
    Phone VARCHAR(10) COMMENT '手機'
);

CREATE TABLE `ORGANIZATION` (
	OrgID CHAR(5) NOT NULL PRIMARY KEY COMMENT '部門代碼',
	OrgName VARCHAR(40) NOT NULL COMMENT '部門名稱',
	MgrID CHAR(6) COMMENT '部門主管'
);
CREATE INDEX `MgrID` ON `ORGANIZATION` (`MgrID`);

CREATE TABLE `SCHEDUL` (
    DutyID CHAR(5) NOT NULL COMMENT '出勤類別',
	EmpID CHAR(6) NOT NULL COMMENT '員工編號',
    From_Time DATE NOT NULL COMMENT '開始時間',
    End_Time DATE NOT NULL COMMENT '結束時間',
    TXDate DATETIME NOT NULL COMMENT '修改時間'
);

CREATE TABLE `DUTY` (
    DutyID CHAR(5) NOT NULL COMMENT '出勤類別',
	EmpID CHAR(6) NOT NULL COMMENT '員工編號',
	OrgID CHAR(5) NOT NULL COMMENT '部門代碼',
	ActualOnDutyTime DATETIME COMMENT '實際出勤開始時間',
	ActualOffDutyTime DATETIME COMMENT '實際出勤結束時間'
);

CREATE TABLE `LEAVE` (
    LeaveID CHAR(5) NOT NULL COMMENT '休假類別',
	EmpID CHAR(6) NOT NULL COMMENT '員工編號',
	OrgID CHAR(5) NOT NULL COMMENT '部門代碼',
	ActualLeaveStartTime DATETIME COMMENT '實際休假開始時間',
	ActualLeaveEndTime DATETIME COMMENT '實際休假結束時間'
);

CREATE TABLE `DUTYRULE` (
	DutyID CHAR(5) NOT NULL PRIMARY KEY COMMENT '出勤類別',
	DutyName VARCHAR(20) NOT NULL COMMENT '出勤中文類別',
	RegularOnDutyTime CHAR(4) NOT NULL COMMENT '正常出勤開始時間',
	RegularOffDutyTime CHAR(4) NOT NULL COMMENT '正常出勤結束時間'
);

CREATE TABLE `LEAVERULE` (
	LeaveID CHAR(5) NOT NULL PRIMARY KEY COMMENT '休假類別',
	LeaveName VARCHAR(20) NOT NULL COMMENT '休假中文類別',
	RegularLeaveHour DECIMAL(5, 1) NOT NULL COMMENT '休假時數'
);

CREATE TABLE `REGULATION` (
	RuleKind VARCHAR(30) NOT NULL COMMENT '設定種類',
	RuleID VARCHAR(30) NOT NULL COMMENT '設定代碼',
	RuleValue1 VARCHAR(200) COMMENT '設定值1',
	RuleValue2 VARCHAR(200) COMMENT '設定值2',
	RuleValue3 VARCHAR(200) COMMENT '設定值3',
	RuleValue4 VARCHAR(200) COMMENT '設定值4'
);

ALTER TABLE `EMPLOYEE`
    ADD CONSTRAINT `EMPLOYEE_ibfk_1` FOREIGN KEY (`OrgID`) REFERENCES `ORGANIZATION` (`OrgID`);
ALTER TABLE `ORGANIZATION`
	ADD CONSTRAINT `ORGANIZATION_ibfk_1` FOREIGN KEY (`MgrID`) REFERENCES `EMPLOYEE` (`EmpID`);
ALTER TABLE `SCHEDUL`
    ADD CONSTRAINT `DUTYLOG_ibfk_1` FOREIGN KEY (`DutyID`) REFERENCES `DUTYRULE` (`DutyID`),
    ADD CONSTRAINT `DUTYLOG_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `EMPLOYEE` (`EmpID`);
ALTER TABLE `DUTY`
    ADD CONSTRAINT `DUTY_ibfk_1` FOREIGN KEY (`DutyID`) REFERENCES `DUTYRULE` (`DutyID`),
    ADD CONSTRAINT `DUTY_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `EMPLOYEE` (`EmpID`),
    ADD CONSTRAINT `DUTY_ibfk_3` FOREIGN KEY (`OrgID`) REFERENCES `ORGANIZATION` (`OrgID`);
ALTER TABLE `LEAVE`
    ADD CONSTRAINT `LEAVE_ibfk_1` FOREIGN KEY (`LeaveID`) REFERENCES `LEAVERULE` (`LeaveID`),
    ADD CONSTRAINT `LEAVE_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `EMPLOYEE` (`EmpID`),
    ADD CONSTRAINT `LEAVE_ibfk_3` FOREIGN KEY (`OrgID`) REFERENCES `ORGANIZATION` (`OrgID`);