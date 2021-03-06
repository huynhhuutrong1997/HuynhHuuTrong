USE [QuanLyBanMayTinh]
GO
/****** Object:  Table [dbo].[TaiKhoan]    Script Date: 01/02/2018 21:51:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[TaiKhoan]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[TaiKhoan](
	[ID] [int] NOT NULL,
	[TenDN] [varchar](16) NULL,
	[MatKhau] [varchar](16) NULL,
 CONSTRAINT [PK_TaiKhoan] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[TaiKhoan] ([ID], [TenDN], [MatKhau]) VALUES (1, N'admin', N'admin')
/****** Object:  Table [dbo].[NhanVien]    Script Date: 01/02/2018 21:51:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[NhanVien]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[NhanVien](
	[MaNV] [varchar](10) NOT NULL,
	[TenNV] [nvarchar](25) NULL,
	[Gioitinh] [nchar](10) NULL,
	[Diachi] [nvarchar](50) NULL,
	[SDT] [varchar](11) NULL,
 CONSTRAINT [PK_NhanVien] PRIMARY KEY CLUSTERED 
(
	[MaNV] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[NhanVien] ([MaNV], [TenNV], [Gioitinh], [Diachi], [SDT]) VALUES (N'MNV01', N'Nguyễn Văn A', N'Nam       ', N'Cần Thơ', N'0136589775')
INSERT [dbo].[NhanVien] ([MaNV], [TenNV], [Gioitinh], [Diachi], [SDT]) VALUES (N'MNV02', N'Nguyễn Thị H', N'Nữ        ', N'TPHCM', N'02365895698')
INSERT [dbo].[NhanVien] ([MaNV], [TenNV], [Gioitinh], [Diachi], [SDT]) VALUES (N'MNV03', N'Trương Tam Phong', N'Nam       ', N'Núi Võ Đang', N'09642785236')
INSERT [dbo].[NhanVien] ([MaNV], [TenNV], [Gioitinh], [Diachi], [SDT]) VALUES (N'MNV04', N'Tôn Ngộ Không', N'Nam       ', N'Hoa Quả Sơn', N'01643625879')
INSERT [dbo].[NhanVien] ([MaNV], [TenNV], [Gioitinh], [Diachi], [SDT]) VALUES (N'MNV06', N'Trần Thị A', N'Nam       ', N'Cần Thơ', N'01364578770')
INSERT [dbo].[NhanVien] ([MaNV], [TenNV], [Gioitinh], [Diachi], [SDT]) VALUES (N'MNV07', N'Lê Văn W', N'Nam       ', N'Số 1', N'01342444442')
/****** Object:  Table [dbo].[NhaCungCap]    Script Date: 01/02/2018 21:51:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[NhaCungCap]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[NhaCungCap](
	[MaNCC] [varchar](10) NOT NULL,
	[TenNCC] [nvarchar](50) NULL,
	[Diachi] [nvarchar](50) NULL,
	[SDT] [varchar](11) NULL,
 CONSTRAINT [PK_NhaCungCap] PRIMARY KEY CLUSTERED 
(
	[MaNCC] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[NhaCungCap] ([MaNCC], [TenNCC], [Diachi], [SDT]) VALUES (N'NCC01', N'Nhà cung cấp 1', N'Cần Thơ', N'0965855789')
INSERT [dbo].[NhaCungCap] ([MaNCC], [TenNCC], [Diachi], [SDT]) VALUES (N'NCC02', N'Nhà cung cấp 2', N'TPHCM', N'01632589654')
INSERT [dbo].[NhaCungCap] ([MaNCC], [TenNCC], [Diachi], [SDT]) VALUES (N'NCC03', N'Nhà Cung Cấp 3', N'Đồng Tháp', N'01643606588')
INSERT [dbo].[NhaCungCap] ([MaNCC], [TenNCC], [Diachi], [SDT]) VALUES (N'NCC04', N'Nhà cung cấp 4', N'Hà Nội', N'01236547894')
INSERT [dbo].[NhaCungCap] ([MaNCC], [TenNCC], [Diachi], [SDT]) VALUES (N'NCC05', N'Nhà cung cấp 5', N'TPHCM', N'01236584899')
/****** Object:  Table [dbo].[KhachHang]    Script Date: 01/02/2018 21:51:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[KhachHang]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[KhachHang](
	[MaKH] [varchar](10) NOT NULL,
	[TenKH] [nvarchar](25) NULL,
	[Gioitinh] [nchar](10) NULL,
	[Diachi] [nvarchar](50) NULL,
	[SDT] [varchar](11) NULL,
 CONSTRAINT [PK_KhachHang] PRIMARY KEY CLUSTERED 
(
	[MaKH] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[KhachHang] ([MaKH], [TenKH], [Gioitinh], [Diachi], [SDT]) VALUES (N'KH01', N'Nguyễn Văn A', N'Nam       ', N'Cần Thơ', N'01643606417')
INSERT [dbo].[KhachHang] ([MaKH], [TenKH], [Gioitinh], [Diachi], [SDT]) VALUES (N'KH02', N'Nguyễn Thị A', N'Nữ        ', N'Đồng Tháp', N'01234567897')
INSERT [dbo].[KhachHang] ([MaKH], [TenKH], [Gioitinh], [Diachi], [SDT]) VALUES (N'KH03', N'Nguyễn Văn B', N'Nam       ', N'Cần Thơ', N'01234545454')
INSERT [dbo].[KhachHang] ([MaKH], [TenKH], [Gioitinh], [Diachi], [SDT]) VALUES (N'KH04', N'Trần Văn S', N'Nam       ', N'Đồng Tháp', N'01265487556')
INSERT [dbo].[KhachHang] ([MaKH], [TenKH], [Gioitinh], [Diachi], [SDT]) VALUES (N'KH05', N'Lê Văn F', N'Nam       ', N'TPHCM', N'09236587555')
INSERT [dbo].[KhachHang] ([MaKH], [TenKH], [Gioitinh], [Diachi], [SDT]) VALUES (N'KH06', N'Nguyễn Văn C', N'Nam       ', N'Cần Thơ', N'01265489996')
INSERT [dbo].[KhachHang] ([MaKH], [TenKH], [Gioitinh], [Diachi], [SDT]) VALUES (N'KH07', N'Lê Thị A', N'Khác      ', N'Cà Mau', N'01648585555')
/****** Object:  Table [dbo].[ThongTinMayTinh]    Script Date: 01/02/2018 21:51:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[ThongTinMayTinh]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[ThongTinMayTinh](
	[MaMT] [varchar](10) NOT NULL,
	[TenMT] [nvarchar](50) NULL,
	[MaNCC] [varchar](10) NULL,
	[Soluong] [int] NULL,
	[Giaban] [money] NULL,
	[Gianhap] [money] NULL,
 CONSTRAINT [PK_ThongTinMayTinh] PRIMARY KEY CLUSTERED 
(
	[MaMT] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[ThongTinMayTinh] ([MaMT], [TenMT], [MaNCC], [Soluong], [Giaban], [Gianhap]) VALUES (N'MT01', N'DELL 1', N'NCC01', 2, 20000.0000, 10000.0000)
INSERT [dbo].[ThongTinMayTinh] ([MaMT], [TenMT], [MaNCC], [Soluong], [Giaban], [Gianhap]) VALUES (N'MT02', N'DELL 2', N'NCC02', 5, 500000.0000, 450000.0000)
INSERT [dbo].[ThongTinMayTinh] ([MaMT], [TenMT], [MaNCC], [Soluong], [Giaban], [Gianhap]) VALUES (N'MT03', N'HP 3', N'NCC03', 6, 400000.0000, 300000.0000)
INSERT [dbo].[ThongTinMayTinh] ([MaMT], [TenMT], [MaNCC], [Soluong], [Giaban], [Gianhap]) VALUES (N'MT04', N'HP 2', N'NCC02', 5, 25555.0000, 20000.0000)
INSERT [dbo].[ThongTinMayTinh] ([MaMT], [TenMT], [MaNCC], [Soluong], [Giaban], [Gianhap]) VALUES (N'MT05', N'DELL 5', N'NCC02', 1, 250000.0000, 200000.0000)
INSERT [dbo].[ThongTinMayTinh] ([MaMT], [TenMT], [MaNCC], [Soluong], [Giaban], [Gianhap]) VALUES (N'MT06', N'ASUS', N'NCC02', 8, 2500000.0000, 200000.0000)
/****** Object:  Table [dbo].[HoaDonNhap]    Script Date: 01/02/2018 21:51:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HoaDonNhap]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[HoaDonNhap](
	[MaHDN] [varchar](10) NOT NULL,
	[MaNV] [varchar](10) NULL,
	[MaMT] [varchar](10) NULL,
	[MaNCC] [varchar](10) NULL,
	[Soluong] [int] NULL,
	[Ngaynhap] [date] NULL,
	[Diachi] [nvarchar](50) NULL,
	[SDT] [varchar](11) NULL,
	[Gianhap] [money] NULL,
	[Tongtien] [money] NULL,
 CONSTRAINT [PK_HoaDonNhap] PRIMARY KEY CLUSTERED 
(
	[MaHDN] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[HoaDonNhap] ([MaHDN], [MaNV], [MaMT], [MaNCC], [Soluong], [Ngaynhap], [Diachi], [SDT], [Gianhap], [Tongtien]) VALUES (N'HDN01', N'MNV02', N'MT01', N'NCC02', 1, CAST(0xAE3D0B00 AS Date), N'TPHCM', N'01632589654', 10000.0000, 3000000.0000)
INSERT [dbo].[HoaDonNhap] ([MaHDN], [MaNV], [MaMT], [MaNCC], [Soluong], [Ngaynhap], [Diachi], [SDT], [Gianhap], [Tongtien]) VALUES (N'HDN02', N'MNV03', N'MT05', N'NCC01', 1, CAST(0xB03D0B00 AS Date), N'Cần Thơ', N'0965855789', 200000.0000, 200000.0000)
INSERT [dbo].[HoaDonNhap] ([MaHDN], [MaNV], [MaMT], [MaNCC], [Soluong], [Ngaynhap], [Diachi], [SDT], [Gianhap], [Tongtien]) VALUES (N'HDN03', N'MNV03', N'MT02', N'NCC03', 1, CAST(0xC63C0B00 AS Date), N'Đồng Tháp', N'01643606588', 450000.0000, 450000.0000)
/****** Object:  Table [dbo].[HoaDonBan]    Script Date: 01/02/2018 21:51:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[HoaDonBan]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[HoaDonBan](
	[MaHDB] [varchar](10) NOT NULL,
	[MaNV] [varchar](10) NULL,
	[MaKH] [varchar](10) NULL,
	[MaMT] [varchar](10) NULL,
	[Soluong] [int] NULL,
	[Ngayban] [date] NULL,
	[Diachi] [nvarchar](50) NULL,
	[SDT] [varchar](11) NULL,
	[Giaban] [money] NULL,
	[Tongtien] [money] NULL,
 CONSTRAINT [PK_HoaDonBan_1] PRIMARY KEY CLUSTERED 
(
	[MaHDB] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[HoaDonBan] ([MaHDB], [MaNV], [MaKH], [MaMT], [Soluong], [Ngayban], [Diachi], [SDT], [Giaban], [Tongtien]) VALUES (N'HDB01', N'MNV02', N'KH01', N'MT04', 1, CAST(0x9B3D0B00 AS Date), N'Cần Thơ', N'01643606417', 25555.0000, 25555.0000)
INSERT [dbo].[HoaDonBan] ([MaHDB], [MaNV], [MaKH], [MaMT], [Soluong], [Ngayban], [Diachi], [SDT], [Giaban], [Tongtien]) VALUES (N'HDB02', N'MNV02', N'KH04', N'MT06', 1, CAST(0x733C0B00 AS Date), N'Đồng Tháp', N'01265487556', 2500000.0000, 2500000.0000)
INSERT [dbo].[HoaDonBan] ([MaHDB], [MaNV], [MaKH], [MaMT], [Soluong], [Ngayban], [Diachi], [SDT], [Giaban], [Tongtien]) VALUES (N'HDB03', N'MNV06', N'KH06', N'MT03', 1, CAST(0x803C0B00 AS Date), N'Cần Thơ', N'01265489996', 400000.0000, 250000.0000)
/****** Object:  ForeignKey [FK_HoaDonBan_KhachHang]    Script Date: 01/02/2018 21:51:50 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonBan_KhachHang]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonBan]'))
ALTER TABLE [dbo].[HoaDonBan]  WITH CHECK ADD  CONSTRAINT [FK_HoaDonBan_KhachHang] FOREIGN KEY([MaKH])
REFERENCES [dbo].[KhachHang] ([MaKH])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonBan_KhachHang]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonBan]'))
ALTER TABLE [dbo].[HoaDonBan] CHECK CONSTRAINT [FK_HoaDonBan_KhachHang]
GO
/****** Object:  ForeignKey [FK_HoaDonBan_NhanVien]    Script Date: 01/02/2018 21:51:50 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonBan_NhanVien]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonBan]'))
ALTER TABLE [dbo].[HoaDonBan]  WITH CHECK ADD  CONSTRAINT [FK_HoaDonBan_NhanVien] FOREIGN KEY([MaNV])
REFERENCES [dbo].[NhanVien] ([MaNV])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonBan_NhanVien]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonBan]'))
ALTER TABLE [dbo].[HoaDonBan] CHECK CONSTRAINT [FK_HoaDonBan_NhanVien]
GO
/****** Object:  ForeignKey [FK_HoaDonBan_ThongTinMayTinh]    Script Date: 01/02/2018 21:51:50 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonBan_ThongTinMayTinh]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonBan]'))
ALTER TABLE [dbo].[HoaDonBan]  WITH CHECK ADD  CONSTRAINT [FK_HoaDonBan_ThongTinMayTinh] FOREIGN KEY([MaMT])
REFERENCES [dbo].[ThongTinMayTinh] ([MaMT])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonBan_ThongTinMayTinh]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonBan]'))
ALTER TABLE [dbo].[HoaDonBan] CHECK CONSTRAINT [FK_HoaDonBan_ThongTinMayTinh]
GO
/****** Object:  ForeignKey [FK_HoaDonNhap_NhaCungCap]    Script Date: 01/02/2018 21:51:50 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonNhap_NhaCungCap]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonNhap]'))
ALTER TABLE [dbo].[HoaDonNhap]  WITH CHECK ADD  CONSTRAINT [FK_HoaDonNhap_NhaCungCap] FOREIGN KEY([MaNCC])
REFERENCES [dbo].[NhaCungCap] ([MaNCC])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonNhap_NhaCungCap]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonNhap]'))
ALTER TABLE [dbo].[HoaDonNhap] CHECK CONSTRAINT [FK_HoaDonNhap_NhaCungCap]
GO
/****** Object:  ForeignKey [FK_HoaDonNhap_NhanVien]    Script Date: 01/02/2018 21:51:50 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonNhap_NhanVien]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonNhap]'))
ALTER TABLE [dbo].[HoaDonNhap]  WITH CHECK ADD  CONSTRAINT [FK_HoaDonNhap_NhanVien] FOREIGN KEY([MaNV])
REFERENCES [dbo].[NhanVien] ([MaNV])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonNhap_NhanVien]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonNhap]'))
ALTER TABLE [dbo].[HoaDonNhap] CHECK CONSTRAINT [FK_HoaDonNhap_NhanVien]
GO
/****** Object:  ForeignKey [FK_HoaDonNhap_ThongTinMayTinh]    Script Date: 01/02/2018 21:51:50 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonNhap_ThongTinMayTinh]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonNhap]'))
ALTER TABLE [dbo].[HoaDonNhap]  WITH CHECK ADD  CONSTRAINT [FK_HoaDonNhap_ThongTinMayTinh] FOREIGN KEY([MaMT])
REFERENCES [dbo].[ThongTinMayTinh] ([MaMT])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_HoaDonNhap_ThongTinMayTinh]') AND parent_object_id = OBJECT_ID(N'[dbo].[HoaDonNhap]'))
ALTER TABLE [dbo].[HoaDonNhap] CHECK CONSTRAINT [FK_HoaDonNhap_ThongTinMayTinh]
GO
/****** Object:  ForeignKey [FK_ThongTinMayTinh_NhaCungCap]    Script Date: 01/02/2018 21:51:50 ******/
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ThongTinMayTinh_NhaCungCap]') AND parent_object_id = OBJECT_ID(N'[dbo].[ThongTinMayTinh]'))
ALTER TABLE [dbo].[ThongTinMayTinh]  WITH CHECK ADD  CONSTRAINT [FK_ThongTinMayTinh_NhaCungCap] FOREIGN KEY([MaNCC])
REFERENCES [dbo].[NhaCungCap] ([MaNCC])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_ThongTinMayTinh_NhaCungCap]') AND parent_object_id = OBJECT_ID(N'[dbo].[ThongTinMayTinh]'))
ALTER TABLE [dbo].[ThongTinMayTinh] CHECK CONSTRAINT [FK_ThongTinMayTinh_NhaCungCap]
GO
