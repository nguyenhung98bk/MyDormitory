create or replace function tf_af_insert() returns trigger as  $$
Begin
	update phong	set sncur=sncur+1 
		where msphong = New.msphong;
	Return NEW;
END;
$$
language plpgsql;
CREATE trigger after_insert after insert on phieudangky
for each row 
when (new.msphong IS Not null)
Execute procedure tf_af_insert();
