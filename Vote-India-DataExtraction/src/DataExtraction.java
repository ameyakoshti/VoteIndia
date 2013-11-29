import java.awt.FileDialog;
import java.awt.Frame;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
import org.openrdf.repository.RepositoryException;

import formatconverter.formatconverter;

public class DataExtraction {
	static FileWriter writer;
	
	static List<String[]> data = new ArrayList<String[]>();

	public static void main(String[] args) throws RepositoryException, IOException {

		// formatconverter inputFile = new formatconverter();
		// inputFile.loadFile(new Frame(),
		// "Choose a CSV File","/Users/ameyakoshti/Downloads", "*.csv");

		DataExtraction cmsOfAllStates = new DataExtraction();
		List<String> state=formatconverter.getStateName();
		Iterator<String> i=state.iterator();

		writer = new FileWriter("cm.csv");
		writer.append("CMName, JoinDate, LeftDate, State");
		
		while(i.hasNext())
		{
		writer.append("\n");
		cmsOfAllStates.scrapeCM(i.next());
		}
		writer.close();
	}

	
	public void scrapeCM(String state) {
		try {
			System.out.println(state);
			if(state.equals("Punjab"))
				state="Punjab_(India)";
			String link="http://en.wikipedia.org/wiki/List_of_Chief_Ministers_of_" + state;
			System.out.println(link);
			Document html = Jsoup.connect(link).get();
			Element table = html.select("table[class=wikitable]").last();
			if (table == null) {
				table = html.select("table[class=wikitable sortable]").last();
			}
			Elements rows = table.select("tr:gt(0)");

			String name = "";
			for (Element row : rows) {
				int numcol = 1;
				String regexStr;

				Elements tds = row.select("td");
				for (Element td : tds) {
					switch (numcol) {
					case 1:
						regexStr = td.text().replace(",", " ");
						if (regexStr.matches("([0-9].*)([a-zA-Z].*)([0-9].*)[ - ].*")) {
							writer.append(name);
							writer.append(',');
							String[] datesplit = td.text().toString().split(" ");
							writer.append(datesplit[0] + " " + datesplit[1] + " " + datesplit[2]);
							writer.append(',');
							writer.append(datesplit[4] + " " + datesplit[5] + " " + datesplit[6]);
							writer.append(',');
							numcol++;
							numcol++;
							numcol++;
						} else if (regexStr.matches("([0-9].*)([a-zA-Z].*)([0-9].*)")) {
							writer.append(name);
							writer.append(',');
							writer.append(td.text());
							writer.append(',');
							numcol++;
							numcol++;
						}
						break;
					case 2: {
						if (td.text().toLowerCase().contains("president's rule")) {
							numcol = 5;
						} else {
							name = td.text().replace(",", " ").replace("[", "").replaceAll("\\d*", "").replace("]", "");
							writer.append(name);
							writer.append(',');
						}
						break;

					}
					case 3: {
						regexStr = td.text().replace(",", " ");
						if (regexStr.matches("([0-9].*)([a-zA-Z].*)([0-9].*)[ - ].*")) {
							String[] datesplit = td.text().toString().replace(",", " ").split(" ");
							writer.append(datesplit[0] + " " + datesplit[1] + " " + datesplit[2]);
							writer.append(',');
							writer.append(datesplit[4] + " " + datesplit[5] + " " + datesplit[6]);
							writer.append(',');
							numcol++;
							numcol++;
							writer.append(state);
							writer.append(',');	
						} else {
							Element temp = td.select("img").first();

							if (temp == null) {
								if (!td.text().isEmpty()) {
									writer.append(td.text());
									writer.append(',');
								} else {
									numcol--;
								}
							} else {
								numcol--;
							}
						}

						break;
					}
					case 4: {
						writer.append(td.text());
						writer.append(',');
						writer.append(state);
						writer.append(',');	
						formatconverter.getCMDetails(name, writer);
						
					}

					}
					if (numcol == 5)
						break;
					numcol++;

				}
				
				writer.append('\n');

			}
			System.out.println("done");
		} catch (Exception e) {
			System.out.println("scrapeCM Function : " + e.toString());
		}
	}
	
	
	
	
	
	
	public void scrapeCM1(String state) {
		try {
			System.out.println(state);
			if(state.equals("Punjab"))
				state="Punjab_(India)";
			String link="http://en.wikipedia.org/wiki/List_of_Chief_Ministers_of_" + state;
			System.out.println(link);
			Document html = Jsoup.connect(link).get();
			Element table = html.select("table[class=wikitable]").last();
			if (table == null) {
				table = html.select("table[class=wikitable sortable]").last();
			}
			Elements rows = table.select("tr:gt(0)");

			
			String name = "";
			for (Element row : rows) {
				int numcol = 1;
				String regexStr;
				
				Elements tds = row.select("td");
				for (Element td : tds) {
					
					switch (numcol) {
					case 1:
						regexStr = td.text().replace(",", " ");
						if (regexStr.matches("([0-9].*)([a-zA-Z].*)([0-9].*)[ - ].*")) {
							writer.append(name);
							writer.append(',');
							String[] datesplit = td.text().toString().split(" ");
							writer.append(datesplit[0] + " " + datesplit[1] + " " + datesplit[2]);
							writer.append(',');
							writer.append(datesplit[4] + " " + datesplit[5] + " " + datesplit[6]);
							writer.append(',');
							numcol++;
							numcol++;
							numcol++;
						} else if (regexStr.matches("([0-9].*)([a-zA-Z].*)([0-9].*)")) {
							writer.append(name);
							writer.append(',');
							writer.append(td.text());
							writer.append(',');
							numcol++;
							numcol++;
						}
						else
							
						break;
					case 2: {
						if (td.text().toLowerCase().contains("president's rule")) {
							numcol = 5;
						} else {
							name = td.text().replace("[", "").replaceAll("\\d*", "").replace("]", "");
							writer.append(name);
							writer.append(',');
						}
						break;

					}
					case 3: {
						regexStr = td.text().replace(",", " ");
						if (regexStr.matches("([0-9].*)([a-zA-Z].*)([0-9].*)[ - ].*")) {
							String[] datesplit = td.text().toString().split(" ");
							writer.append(datesplit[0] + " " + datesplit[1] + " " + datesplit[2]);
							writer.append(',');
							writer.append(datesplit[4] + " " + datesplit[5] + " " + datesplit[6]);
							writer.append(',');
							numcol++;
							numcol++;
						} else {
							Element temp = td.select("img").first();

							if (temp == null) {
								if (!td.text().isEmpty()) {
									writer.append(td.text());
									writer.append(',');
								} else {
									numcol--;
								}
							} else {
								numcol--;
							}
						}

						break;
					}
					case 4: {
						writer.append(td.text());
						writer.append(',');
						writer.append(state+" , ");
							
					}
					
					}
					if (numcol == 5)
						break;
					numcol++;
					

				}
				writer.append('\n');

			}
	
			System.out.println("done");
		} catch (Exception e) {
			System.out.println("scrapeCM Function : " + e.toString());
		}
	}

	public void loadFile(Frame f, String title, String defDir, String fileType) {
		FileDialog fd = new FileDialog(f, title, FileDialog.LOAD);
		fd.setFile(fileType);
		fd.setDirectory(defDir);
		fd.setLocation(50, 50);
		fd.setVisible(true);
		if (fd.getFile() != null) {
			readCsvFile(fd.getDirectory(), fd.getFile());
		}
	}

	public int numberOfLines(String csvFileDirectory, String csvFile) {
		int countLines = 0;
		BufferedReader br = null;
		try {
			br = new BufferedReader(new FileReader(csvFileDirectory + csvFile));
			while (br.readLine() != null) {
				countLines++;
			}
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		} finally {
			if (br != null) {
				try {
					br.close();
				} catch (IOException e) {
					e.printStackTrace();
				}
			}
		}
		return countLines;
	}

	public void readCsvFile(String csvFileDirectory, String csvFile) {

		FileDialog fd = new FileDialog(new Frame(), "Save...", FileDialog.SAVE);
		fd.setFile(".csv");
		fd.setDirectory("/Users/ameyakoshti/Downloads");
		fd.setLocation(50, 50);
		fd.setVisible(true);
		String outputFileName = fd.getFile();
		String outputFileDirectory = fd.getDirectory();

		// Reading CSV
		BufferedReader br = null;
		String line = "", lineHeader = "";
		String cvsSplitBy = ",";

		// Get the total number of lines in the CSV; -1 for the header
		int totalLines = numberOfLines(csvFileDirectory, csvFile) - 1;

		// Writing CSV
		FileWriter writer;
		try {
			writer = new FileWriter(outputFileDirectory + outputFileName);
			try {

				br = new BufferedReader(new FileReader(csvFileDirectory + csvFile));
				lineHeader = br.readLine();
				String[] header = lineHeader.split(cvsSplitBy);

				// Getting the location in the header from where
				// states,factors,year starts
				int statesAt = 0;
				int factorsAt = 0;
				int yearStartsAt = 0;

				for (yearStartsAt = 0; yearStartsAt < header.length; yearStartsAt++) {
					if (header[yearStartsAt].toLowerCase().contains("state")) {
						statesAt = yearStartsAt;
					}
					if (header[yearStartsAt].toLowerCase().contains("factor")) {
						factorsAt = yearStartsAt;
					}
					if (header[yearStartsAt].matches(".*\\d.*")) {
						break;
					}
				}

				for (int iterateStates = 0; iterateStates < totalLines; iterateStates++) {
					line = br.readLine();
					System.out.println("-----------------");
					for (int iterateYears = yearStartsAt; iterateYears < header.length; iterateYears++) {
						String year = header[iterateYears];
						String[] values = line.split(cvsSplitBy);
						System.out.println(values[statesAt] + " " + values[factorsAt] + " " + year + " " + values[iterateYears]);
						writer.append(values[statesAt]);
						writer.append(',');
						writer.append(values[factorsAt]);
						writer.append(',');
						writer.append(year);
						writer.append(',');
						writer.append(values[iterateYears]);
						writer.append('\n');
					}
				}

			} catch (FileNotFoundException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			} finally {
				if (br != null) {
					try {
						br.close();
					} catch (IOException e) {
						e.printStackTrace();
					}
				}
			}

			writer.close();
		} catch (IOException e) {
			e.printStackTrace();
		}
		System.out.println("Done");
	}
}
