import java.awt.FileDialog;
import java.awt.Frame;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

public class DataExtraction {
	static List<String[]> data = new ArrayList<String[]>();

	public static void main(String[] args) {

		// formatconverter inputFile = new formatconverter();
		// inputFile.loadFile(new Frame(),
		// "Choose a CSV File","/Users/ameyakoshti/Downloads", "*.csv");

		DataExtraction cmsOfAllStates = new DataExtraction();
		cmsOfAllStates.scrapeCM();
		// String csv = "F:\\output.csv";
		/*
		 * CSVWriter writer = null; try { writer = new CSVWriter(new
		 * FileWriter(csv)); writer.writeAll(data); writer.close(); } catch
		 * (IOException e) { }
		 */
	}

	public void scrapeCM() {
		try {
			Document html = Jsoup.connect("http://en.wikipedia.org/wiki/List_of_Chief_Ministers_of_Goa").get();
			Element table = html.select("table[class=wikitable]").last();
			Elements rows = table.select("tr:gt(0)");

			for (Element row : rows) {
				Elements tds = row.select("td");
				List<String> list = new ArrayList<String>();
				for (Element td : tds) {
					String regexStr = td.text();
					// adding name and polictical party name
					if (regexStr.matches("[a-zA-Z].*")) {
						list.add(td.text());
					}
					// adding start and end date
					if (regexStr.matches("[0-9].* [a-zA-Z].* [0-9].*")) {
						list.add(td.text());
					}
				}
				String[] array = list.toArray(new String[list.size()]);
				data.add(array);
				System.out.println(tds.toString());
			}

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
