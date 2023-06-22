from pdf import MojRacun

racun = MojRacun(1)
racun.header()
racun.footer()
racun.userInfo("John Doe", "2023-06-22", "2023-06-29")
# racun.headerTable()
racun.tableContent("Test",300,3,900,900,900)
racun.save()
