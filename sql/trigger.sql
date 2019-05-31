-- TRIGGER chay khi co dang ky moi -- 

CREATE OR REPLACE FUNCTION tf_af_insert() RETURNS TRIGGER AS 
$$
	BEGIN
		UPDATE phong SET sncur = sncur+1
		WHERE msphong = NEW.msphong;
		return NEW;
	END;
$$
LANGUAGE plpgsql;
CREATE TRIGGER af_insert
AFTER INSERT ON phieudangky
FOR EACH ROW
WHEN (NEW.msphong IS NOT NULL AND NEW.trangthaidk = 'cho xac nhan')
EXECUTE PROCEDURE tf_af_insert();









CREATE OR REPLACE FUNCTION tf_af_update_cp() RETURNS TRIGGER AS 
$$
	BEGIN
		UPDATE phong SET sncur = sncur+1
		WHERE msphong = NEW.msphong;
		UPDATE phong SET sncur = sncur-1
		WHERE msphong = OLD.msphong;
		return NEW;
	END;
$$
LANGUAGE plpgsql;
CREATE TRIGGER af_update_cp
AFTER UPDATE ON phieudangky
FOR EACH ROW
WHEN (NEW.msphong IS DISTINCT FROM OLD.msphong AND OLD.kyo = NEW.kyo)
EXECUTE PROCEDURE tf_af_update_cp();
																																				  
																																				  
																																				  
