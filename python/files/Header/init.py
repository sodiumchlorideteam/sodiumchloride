import sys
import json
file_name = sys.argv[1]
file_path = sys.argv[2]
python_library = sys.argv[3]
# python library path
sys.path.insert(1,python_library)
from Sodium import GetHeaderData

data   = GetHeaderData.Return_Data(file_name,file_path)
print(data.__return__())