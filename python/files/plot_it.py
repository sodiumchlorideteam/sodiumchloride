def plot_it(who,plot_path,x,y,x_label_array,y_label_array,calc_template,given_value,prediction,prediction_based_on):
	if prediction_based_on == "x":
		x_plot = given_value
		y_plot = prediction
	else:
		x_plot = prediction	
		y_plot = given_value
	try:
		import matplotlib.pyplot as plt
		import time
	except Exception as e:
		print(str(e))
		exit()
	if who == "linear_regression" :
		try:
			from scipy import stats
		except Exception as e:
			print(str(e))
			exit()
		plt.scatter(x, y)
		plt.plot(x,calc_template)
		plt.xlabel(x_label_array[0])
		plt.ylabel(y_label_array[0])
		plt.plot([float(x_plot)],[float(y_plot)],marker = 'o')
	if who =="polynomial_regression":
		x_sort = sorted(x)
		y_sort = sorted(y)
		x_high = x_sort[len(x_sort)-1]
		y_high = y_sort[len(y_sort)-1]
		if x_sort[0] < y_sort[0]:
			low_all = x_sort[0]
		else:
			low_all = y_sort[0]
		try:
			import numpy 
		except Exception as e:
			print(str(e))
			exit()
		myline = numpy.linspace(low_all,x_high,y_high)
		plt.scatter(x,y)
		plt.plot(myline,calc_template(myline))
		plt.xlabel(x_label_array[0])
		plt.ylabel(y_label_array[0])
		plt.plot([float(x_plot)],[float(y_plot)],marker = 'o')
	file_name = str(time.time())+".png"
	plt.savefig(str(plot_path)+file_name)
	return file_name


class data_visualization:
	def draw_graph(graph,label_array,file_data,plot_path):
		try:
			import matplotlib.pyplot as plt
			import time
			import plotly.graph_objects as go
		except Exception as e:
			print(str(e))
			exit()
		if graph.lower() == "line":
			for i in range(len(label_array)):
				labels = str(label_array[i][0])+"-"+str(label_array[i][1])
				plt.plot(file_data[i][0].values,file_data[i][1].values,label=labels)
			plt.legend(loc='best')
			file_name = str(time.time())+".line"+".png"
			plt.savefig(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "line_markers":
			for i in range(len(label_array)):
				labels = str(label_array[i][0])+"-"+str(label_array[i][1])
				plt.plot(file_data[i][0].values,file_data[i][1].values,label=labels,marker = 'o')
				plt.legend(loc='best')
			file_name = str(time.time())+".line"+".markers"+".png"
			plt.savefig(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "line_fill":
			for i in range(len(label_array)):
				labels = str(label_array[i][0])+"-"+str(label_array[i][1])
				plt.plot(file_data[i][0].values,file_data[i][1].values,label=labels)
				plt.fill_between(file_data[i][0].values,file_data[i][1].values)
				plt.legend(loc='best')
			file_name = str(time.time())+".line"+".fill"+".png"
			plt.savefig(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "line_fill_markers":
			for i in range(len(label_array)):
				labels = str(label_array[i][0])+"-"+str(label_array[i][1])
				plt.plot(file_data[i][0].values,file_data[i][1].values,label=labels,marker = 'o')
				plt.fill_between(file_data[i][0].values,file_data[i][1].values)
				plt.legend(loc='best')
			file_name = str(time.time())+".line"+".fill"+".png"
			plt.savefig(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "pie":
			for i in range(len(label_array)):
				label = file_data[i][0].values
				data  = file_data[i][1].values
				fig1, ax1 = plt.subplots()
				ax1.pie(data, labels=label, autopct='%1.1f%%')
			file_name = str(time.time())+".pie"+".png"
			plt.savefig(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "scatter":
			for i in range(len(label_array)):
				labels = str(label_array[i][0])+"-"+str(label_array[i][1])
				plt.scatter(file_data[i][0].values,file_data[i][1].values,label=labels)
				plt.legend(loc='best')
			file_name = str(time.time())+".scatter"+".png"
			plt.savefig(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "bar":
			bar = []
			for i in range(len(label_array)):
				x  = file_data[i][0].values
				y = file_data[i][1].values
				bar.append(go.Bar(name =label_array[i][1],x=x, y=y,text=y,textposition='auto'))
			fig = go.Figure(data=bar)
			file_name = str(time.time())+".bar"+".png"
			fig.write_image(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "stacked_bar":
			for i in range(len(label_array)):
				x  = file_data[i][0].values
				y  = file_data[i][1].values
				labels = str(label_array[i][0])+"-"+str(label_array[i][1])
				plt.bar(x,y,label=labels)
			plt.xlabel(label_array[0][0])
			plt.legend()
			file_name = str(time.time())+".stacked_bar"+".png"
			plt.savefig(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "horizontal_bar":
			bar = []
			for i in range(len(label_array)):
				x  = file_data[i][0].values
				y = file_data[i][1].values
				bar.append(go.Bar(name =label_array[i][0],x=x, y=y,text=x,textposition='auto',orientation='h'))
			fig = go.Figure(data=bar)
			file_name = str(time.time())+".h_bar"+".png"
			fig.write_image(str(plot_path)+file_name)
			return file_name
		elif graph.lower() == "histogram":
			bar = []
			for i in range(len(label_array)):
				x  = file_data[i][0].values
				y = file_data[i][1].values
				bar.append(go.Histogram(name =label_array[i][0],x=x))
			fig = go.Figure(data=bar)
			file_name = str(time.time())+".histogram"+".png"
			fig.write_image(str(plot_path)+file_name)
			return file_name