try:
	import pandas as pd
except Exception as e:
	print(str(e))
	exit()

class data_visualization:
	def read_file(file_name,file_path,decoded_json):
		split_file_name       = file_name.split(".")
		file_name             = split_file_name[0]
		file_extension        = split_file_name[-1]
		graph                 = decoded_json["graph"]
		label_data_array      = []
		data                  = []
		for i in range(len(decoded_json)):
			try:
				label_data_array_mini = [decoded_json['label-x-'+str(i)],decoded_json['label-y-'+str(i)]]
				label_data_array.append(label_data_array_mini)
			except KeyError:
				pass
		if file_extension == "csv":
			file_data = pd.read_csv(file_path)
		elif file_extension == "xlsx" or file_extension == "xls":
			file_data = pd.read_excel(file_path)
		else:
			print("File extension not supported")
			exit()
		for j in range(len(label_data_array)):
			try:
				mini_data = [file_data[label_data_array[j][0]],file_data[label_data_array[j][1]]]
				data.append(mini_data)
			except KeyError as e:
				print("given feature "+str(e)+" not found !")
				exit()
		return graph.lower(),label_data_array,data


def read_it(file_name,file_path,who,decoded_json,length):
	split_file_name = file_name.split(".")
	file_name       = split_file_name[0]
	file_extension  = split_file_name[1]
	x_label_array  = []
	y_label_array  = []
	for i in range(length):
		try:
			x_label_array.append(decoded_json['label-x-'+str(i)])
			y_label_array.append(decoded_json['label-y-'+str(i)])
		except KeyError:
			pass
	if len(x_label_array) != len(y_label_array):
		print('feature error found !')
		exit()
	if file_extension == "csv":
		file_data = pd.read_csv(file_path)
	elif file_extension == "xlsx" or file_extension == "xls":
		file_data = pd.read_excel(file_path)
	else:
		return False
	extracted_data = __extract__data__(x_label_array,y_label_array,file_data)
	return x_label_array,y_label_array,extracted_data


#get data from the file using given labels
def __extract__data__(x_label_array,y_label_array,file_data):
	data = []
	for k in range(len(x_label_array)):
		try:
			array = [file_data[x_label_array[k]],file_data[y_label_array[k]]]
			data.append(array)
		except KeyError as e:
			print("given feature "+str(e)+" not found !")
			exit()
	return data

class statistics:
	def read_file(file_name,file_path,who,decoded_json,length):
		split_file_name = file_name.split(".")
		file_name       = split_file_name[0]
		file_extension  = split_file_name[1]
		data            = []
		for i in range(1):
			try:
				method = decoded_json['method']
				label  = decoded_json['label']
			except KeyError:
				pass
			if file_extension == "csv":
				file_data = pd.read_csv(file_path)
			elif file_extension == "xlsx" or file_extension == "xls":
				file_data = pd.read_excel(file_path)
			else:
				return False
			try:
				data.append(file_data[label])
			except KeyError as e:
				print("given feature "+str(e)+" not found !")
				exit()
		return method.lower(),label,data