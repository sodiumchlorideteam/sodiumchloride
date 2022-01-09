import pandas as pd
class Return_Data:
	def __init__(self,file_name,file_path):
		self.file_name = file_name
		self.file_path = file_path
		
	def __return__(self):
		file = self.file_name.split(".")
		extension = file[-1]
		if extension == "csv":
			file_data  = pd.read_csv(self.file_path)
		elif extension == "xlsx" or extension == "xls":
			file_data = pd.read_excel(self.file_path)
		i = 0
		json      = ""
		for col in file_data.columns:
			if file_data[col].dtype == "object":
				col_type = "string"
			elif file_data[col].dtype == "int64":
				col_type = "integer"
			elif file_data[col].dtype == "float64":
				col_type = "float"
			else:
				col_type = file_data[col].dtype
			if i == len(file_data.columns)-1:
				value = '"'+str(col)+'"'+': "'+str(col_type)+'"}'
			elif i == 0:
				value = '{ "'+str(col)+'":"'+str(col_type)+'",'
			else:
				value =  '"'+str(col)+'":"'+str(col_type)+'",'
			json += value
			i += 1
		return json
		