CREATE TABLE i_t_inbound
(
   id           int(10),
   id_inbound   varchar(20),
   po_no        varchar(255),
   date_in      datetime,
   barang_kd    varchar(255),
   jml_in       int(10),
   refund       int(10),
   sisa         int(10),
   create_at    datetime,
   create_by    int(10),
   update_at    datetime,
   update_by    int(10),
   delete_at    datetime,
   delete_by    int(10)
)
