from reportlab.pdfgen import canvas
from reportlab.lib.pagesizes import A4
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.ttfonts import TTFont
from reportlab.platypus import Table
from reportlab.lib.units import mm
from reportlab.lib import colors
from datetime import datetime



class MojRacun(canvas.Canvas):
	def __init__(self, id):
		super().__init__("example.pdf", pagesize=A4)
		self.id = id
		self.set_ID(id)

	def set_ID(self, id):
		self.id = id

	def header(self):
		pdfmetrics.registerFont(TTFont('Roboto-Black', 'static\\fonts\\Roboto-Black.ttf'))
		pdfmetrics.registerFont(TTFont('Roboto-Medium', 'static\\fonts\\Roboto-Medium.ttf'))
		pdfmetrics.registerFont(TTFont('Roboto-Thin', 'static\\fonts\\Roboto-Thin.ttf'))
		pdfmetrics.registerFont(TTFont('Roboto-Light', 'static\\fonts\\Roboto-Light.ttf'))
		pdfmetrics.registerFont(TTFont('Roboto-ThinItalic', 'static\\fonts\\Roboto-ThinItalic.ttf'))

		self.setFont('Roboto-Medium', size=16)
		str_bill = f"Račun {self.id}/{datetime.today().year}"
		self.drawString(50, 700, str_bill)
		self.setFont('Roboto-Medium', size=20)
		self.drawString(400, 700, "Apartmani Vlasta")
		self.line(50,650,550,650)

	def footer(self):
		self.setFont('Roboto-Light', size=13)
		self.drawCentredString(150, 100, "U ____________________, datuma:______________.")
		self.drawCentredString(450, 120, "Potpis/Signature:")
		self.line(350,100,550,100)
		self.setFont('Roboto-Thin', size=12)
		self.drawCentredString(300, 80, "Uživajte na našoj obali!")
		self.setFont('Roboto-ThinItalic', size=11)
		self.drawCentredString(300, 65, "Enjoy our beaches!")
		for i in range(0, 600, 200):
			self.drawImage("static/media/waves.png", i, 10, 200, 50)

	def userInfo(self, name, date_arrival, date_depart):
		self.setFont('Roboto-Thin', size=17)
		self.drawRightString(100, 600, "Gost")
		self.drawRightString(170, 580, "Ime: " + name)
		self.drawRightString(270, 560, "Datum dolaska: " + date_arrival)
		self.drawRightString(270, 540, "Datum odlaska: " + date_depart)

		self.setFont('Roboto-Thin', size=17)
		self.drawString(450, 600, "Vlasnik")
		self.drawString(360, 580, "Ime: Vlasta Stefani")
		self.drawString(360, 560, "Adresa: Zidarska 65")
		self.drawString(360, 540, "Mob: 099/1866733")
		self.drawString(360, 520, "Email: orjena01@gmail.com")

	def headerTable(self):
		self.setFont('Roboto-Thin', '', 11)
		self.drawString(10, 780, '*Sve cijene su izražene u eurima')

		self.setFont('Roboto-Light', '', 11)
		self.setFillColorRGB(153, 187, 255)

		data = [['Vrsta usluge', 'Iznos akontacije', 'Broj noći', 'Jedinična cijena', 'Ostatak za uplatu', 'Ukupno']]

		table_style = [
			('BACKGROUND', (0, 0), (-1, 0), colors.HexColor('#99bbff')),
			('TEXTCOLOR', (0, 0), (-1, 0), colors.HexColor('#000000')),
			('ALIGN', (0, 0), (-1, 0), 'CENTER'),
			('FONTNAME', (0, 0), (-1, 0), 'Roboto-Light'),
			('FONTSIZE', (0, 0), (-1, 0), 11),
			('BOTTOMPADDING', (0, 0), (-1, 0), 6),
			('TOPPADDING', (0, 0), (-1, 0), 6),
			('LINEBEFORE', (0, 0), (-1, -1), 1, colors.black),  # Border lines
			('LINEAFTER', (0, 0), (-1, -1), 1, colors.black),
			('LINEABOVE', (0, 0), (-1, -1), 1, colors.black),
			('LINEBELOW', (0, 0), (-1, -1), 1, colors.black),
		]

		table = Table(data, style=table_style, colWidths=[32 * mm, 32 * mm, 32 * mm, 32 * mm, 32 * mm, 32 * mm])

		table.wrapOn(self, 200, 400)
		table.drawOn(self, 20, 450)

	def tableContent(self, tservice, noAcc, noNights, unitPrice, to_pay, Total):
		self.setFont('Roboto-Light', '', 11)
		
		data = [['Vrsta usluge', 'Iznos akontacije', 'Broj noći', 'Jedinična cijena', 'Ostatak za uplatu', 'Ukupno'],[tservice, noAcc, noNights, unitPrice, to_pay, Total]]

		table_style = [
			('TEXTCOLOR', (0, 0), (-1, -1), colors.HexColor('#000000')),
			('ALIGN', (0, 0), (-1, -1), 'CENTER'),
			('FONTNAME', (0, 0), (-1, -1), 'Roboto-Light'),
			('FONTSIZE', (0, 0), (-1, -1), 11),
			('BOTTOMPADDING', (0, 0), (-1, -1), 6),
			('TOPPADDING', (0, 0), (-1, -1), 6),
			('LINEBEFORE', (0, 0), (-1, -1), 1, colors.black),  # Border lines
			('LINEAFTER', (0, 0), (-1, -1), 1, colors.black),
			('LINEABOVE', (0, 0), (-1, -1), 1, colors.black),
			('LINEBELOW', (0, 0), (-1, -1), 1, colors.black),
		]

		table = Table(data, style=table_style, colWidths=[32 * mm, 32 * mm, 32 * mm, 32 * mm, 32 * mm, 32 * mm])

		table.wrapOn(self, 200, 400)
		table.drawOn(self, 20, 410)
		self.drawCentredString(100,110,"Euri")


