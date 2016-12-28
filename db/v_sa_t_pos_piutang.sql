create VIEW
v_sa_t_pos_piutang as
select a.id,a.pembayaran_no,b.sale_no,c.cust_nama,c.cust_id,b.sale_tgl,a.tgl_bayar,b.sale_type,c.cust_hp,b.kd_jns_usaha,sum(b.sale_total) as sale_total,sum(a.pembayaran_total) as total_bayar,
       ROUND(((sum(a.pembayaran_total)*100)/sum(b.sale_total)),3) as persentase,
SUM(CASE
    WHEN tgl_bayar BETWEEN b.sale_tgl AND DATE_ADD(b.sale_tgl,INTERVAL 30 DAY) THEN a.pembayaran_total
    end) '30days',
SUM(CASE
    WHEN tgl_bayar BETWEEN DATE_ADD(b.sale_tgl,INTERVAL 30 DAY) AND DATE_ADD(b.sale_tgl,INTERVAL 60 DAY) THEN a.pembayaran_total
    end) '60days',
SUM(CASE
    WHEN tgl_bayar BETWEEN DATE_ADD(b.sale_tgl,INTERVAL 60 DAY) AND DATE_ADD(b.sale_tgl,INTERVAL 90 DAY) THEN a.pembayaran_total
    end) '90days',
SUM(CASE
    WHEN tgl_bayar > DATE_ADD(b.sale_tgl,INTERVAL 90 DAY) THEN a.pembayaran_total
    end) '>90days',
(sum(b.sale_total)-sum(a.pembayaran_total))as outstanding,b.deleted_at,b.deleted_by
from sa_t_pos_pembayaran a
left join sa_t_pos b on a.sale_no=b.sale_no
left join sa_m_customer c on c.cust_id=b.cust_id
group by a.sale_no 